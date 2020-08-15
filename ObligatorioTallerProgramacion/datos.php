<?php

require_once 'libs/Smarty.class.php';
require_once './class.Conexion.BD.php';
require_once 'configuracion.php';

function getConnection() {
    $usuario = getUsuario();
    $clave = getClave();
    $servidor = getServidor();
    $baseDeDatos = getBaseDeDatos();

    $cn = new PDO('mysql:host=' . $servidor . ';dbname=' . $baseDeDatos, $usuario, $clave);
    return $cn;
}

function getCantReservas($usuario_id) {
    $cn = getConnection();

    $sql = "SELECT count(*) FROM reservas where usuario_id=:usuario_id  ";
    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('usuario_id', $usuario_id, PDO::PARAM_INT);
    $sentencia->execute();
    $reservas = $result->fetchAll(PDO::FETCH_ASSOC);
    return $reservas;
}

function usuariosConReservas() {
    $cn = getConnection();

    $sql = "SELECT usuarios.nombre FROM reservas,usuarios where reservas.usuario_id==ususarios.usuario_id ";
    $result = $cn->query($sql);
    $reservas = $result->fetchAll(PDO::FETCH_ASSOC);
    return $reservas;
}

function getUsuario($usuario_id) {
    $cn = getConnection();
    $sql = "SELECT * FROM usuario WHERE usuario_id=:usuario_id";
    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('usuario_id', $usuario_id, PDO::PARAM_INT);
    $sentencia->execute();
    $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);
    return $usuario;
}

function getMoviesWithText($text, $page) {
    $size = 6;
    $offset = ($page - 1) * $size;
    $cn = getConnection();
    $sql = "SELECT * FROM peliculas WHERE titulo LIKE CONCAT('%', :titulo, '%') ORDER BY fecha_lanzamiento DESC LIMIT :desde, 6";
    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('titulo', $text, PDO::PARAM_STR);
    $sentencia->bindParam('desde', $offset, PDO::PARAM_INT);
    $sentencia->execute();
    $movies = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    return $movies;
}


function getCategoryMoviesAjax($id_genero, $page) {
    $size = 6;
    $offset = ($page - 1) * $size;
    $cn = getConnection();
    if ($id_genero != 0) {
        $sql = "SELECT * FROM peliculas WHERE id_genero=:id_genero ORDER BY fecha_lanzamiento DESC LIMIT :desde, 6";
        $sentencia = $cn->prepare($sql);
        $sentencia->bindParam('id_genero', $id_genero, PDO::PARAM_INT);
        $sentencia->bindParam('desde', $offset, PDO::PARAM_INT);
        $sentencia->execute();
        $movies = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $sql = "SELECT * FROM peliculas ORDER BY fecha_lanzamiento DESC LIMIT :desde, 6";
        $sentencia = $cn->prepare($sql);
        $sentencia->bindParam('desde', $offset, PDO::PARAM_INT);
        $sentencia->execute();
        $movies = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    $moviesArray = [];
    foreach ($movies as $movie) {
        $movieAux=$movie;
        $movieScore = getMovieScore($movie['id']);
        $movieAux['score']=$movieScore;
        $moviesArray[]=$movieAux;
    }
    return $moviesArray;
}

function getMovie($id) {
    $cn = getConnection();
    $sql = "SELECT * FROM peliculas WHERE id=:id";
    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('id', $id, PDO::PARAM_INT);
    $sentencia->execute();
    $movie = $sentencia->fetch(PDO::FETCH_ASSOC);

    if (!isset($movie['id']))
        $movie = NULL;
    return $movie;
}

function getMovieComments($movieId, $page) {
    $size = 5;
    $offset = ($page - 1) * $size;
    $cn = getConnection();

    $sql = "SELECT * FROM comentarios WHERE id_pelicula=:id_pelicula AND estado='APROBADO' ORDER BY id DESC LIMIT :desde, 5";

    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('id_pelicula', $movieId, PDO::PARAM_INT);
    $sentencia->bindParam('desde', $offset, PDO::PARAM_INT);
    $sentencia->execute();

    $comments = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $commentsArray = array();
    foreach ($comments as $comment) {
        $comment['user_alias'] = getUserById($comment['id_usuario'])['alias'];
        $commentsArray[] = $comment;
    }
    return $commentsArray;
}

function getPendingComments() {
    $cn = getConnection();

    $sql = "SELECT * FROM comentarios WHERE estado='PENDIENTE'";

    $sentencia = $cn->prepare($sql);
    $sentencia->execute();

    $comments = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $commentsArray = array();
    foreach ($comments as $comment) {
        $user = getUserById($comment['id_usuario']);
        $comment['user_alias'] = $user['alias'];
        $movie = getMovieById($comment['id_pelicula']);
        $comment['movie_title'] = $movie['titulo'];
        $commentsArray[] = $comment;
    }
    return $commentsArray;
}

function getMovieCast($movieId) {
    $cn = getConnection();
    $sql = "SELECT * FROM elencos WHERE id_pelicula=:id_pelicula";
    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('id_pelicula', $movieId, PDO::PARAM_INT);
    $sentencia->execute();
    $cast = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    return $cast;
}

function loadMovieTrailerCode($movie) {
    try {
        $exploded = explode("?v=", $movie['youtube_trailer']);
        $exploded = end($exploded);
        $url = explode("&", $exploded);
        $url = $url[0];
        if ($url == '')
            $url = false;
    } catch (Exception $e) {
        $url = false;
    }
    return $url;
}

function getUser($email, $password) {
    $cn = getConnection();
    $sql = "SELECT * FROM usuarios WHERE email=:email AND password=:password";
    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('email', $email, PDO::PARAM_STR);
    $sentencia->bindParam('password', $password, PDO::PARAM_STR);
    $sentencia->execute();
    $user = $sentencia->fetch(PDO::FETCH_ASSOC);

    if (!isset($user['id']))
        $user = NULL;
    return $user;
}

function alreadyCommentedMovie($userId, $movieId) {
    $cn = getConnection();
    $sql = "SELECT * FROM  comentarios WHERE id_pelicula=:id_pelicula AND id_usuario=:id_usuario";
    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('id_pelicula', $movieId, PDO::PARAM_INT);
    $sentencia->bindParam('id_usuario', $userId, PDO::PARAM_INT);
    $sentencia->execute();
    $comment = $sentencia->fetch(PDO::FETCH_ASSOC);

    return isset($comment['id']);
}

function getMovieScore($movieId) {
    $cn = getConnection();
    $sql = "SELECT * FROM comentarios WHERE id_pelicula=:id_pelicula AND estado='APROBADO'";
    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('id_pelicula', $movieId, PDO::PARAM_INT);
    $sentencia->execute();
    $comments = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $score = 0;
    if (count($comments) > 0) {
        foreach ($comments as $comment) {
            $score += $comment['puntuacion'];
        }
        $score /= count($comments);
    }
    $scoreRounded=round($score);
    return $scoreRounded;
}

function getUserById($id) {
    $cn = getConnection();
    $sql = "SELECT * FROM usuarios WHERE id=:id";
    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('id', $id, PDO::PARAM_INT);
    $sentencia->execute();
    $user = $sentencia->fetch(PDO::FETCH_ASSOC);

    if (!isset($user['id']))
        $user = NULL;
    return $user;
}

function getMovieById($id) {
    $cn = getConnection();
    $sql = "SELECT * FROM peliculas WHERE id=:id";
    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('id', $id, PDO::PARAM_INT);
    $sentencia->execute();
    $movie = $sentencia->fetch(PDO::FETCH_ASSOC);

    if (!isset($movie['id']))
        $movie = NULL;
    return $movie;
}

function login($email, $password) {
    return getUser($email, md5($password));
}

function getSmarty() {
    $mySmarty = new Smarty();
    $mySmarty->template_dir = 'templates';
    $mySmarty->compile_dir = 'templates_c';
    $mySmarty->config_dir = 'config';
    $mySmarty->cache_dir = 'cache';
    return $mySmarty;
}

function saveComment($movieId, $message, $score, $userId) {
    $cn = getConnection();
    $sql = "INSERT INTO comentarios(id_pelicula, mensaje, puntuacion, id_usuario) VALUES(:id_pelicula, :mensaje, :puntuacion, :id_usuario)";

    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('id_pelicula', $movieId, PDO::PARAM_INT);
    $sentencia->bindParam('mensaje', $message, PDO::PARAM_STR);
    $sentencia->bindParam('puntuacion', $score, PDO::PARAM_INT);
    $sentencia->bindParam('id_usuario', $userId, PDO::PARAM_INT);
    $sentencia->execute();

    $comment = $sentencia->fetch(PDO::FETCH_ASSOC);

    return $sentencia;
}

function changeCommentStatus($commentId, $status) {
    $cn = getConnection();
    $sql = "UPDATE comentarios SET estado=:estado WHERE id=:id";

    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('estado', $status, PDO::PARAM_STR);
    $sentencia->bindParam('id', $commentId, PDO::PARAM_INT);
    $sentencia->execute();
    return $sentencia;
}

function getLoggedUser() {
    session_start();
    if (isset($_SESSION["usuarioLogueado"]))
        $user = $_SESSION["usuarioLogueado"];
    else
        $user = null;
    return $user;
}

function emailEnUso($email) {
    $cn = getConnection();
    $sql = "SELECT * FROM usuarios WHERE email=:email";
    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('email', $email, PDO::PARAM_STR);
    $sentencia->execute();
    $user = $sentencia->fetch(PDO::FETCH_ASSOC);

    if (isset($user['id'])) {
        return true;
    } else {
        return false;
    }
}

function registroUsuario($alias, $email, $clave) {
    $cn = getConnection();
    $sql = "INSERT INTO usuarios(email, alias,password) VALUES(:email, :alias, :clave)";

    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('email', $email, PDO::PARAM_INT);
    $sentencia->bindParam('alias', $alias, PDO::PARAM_STR);
    $sentencia->bindParam('clave', md5($clave), PDO::PARAM_INT);
    $sentencia->execute();

    $usuario = $sentencia->fetch(PDO::FETCH_ASSOC);
    return $usuario;
}

function getFileExtension($fileName) {
    $extension = end(explode('.', $fileName));
    if ($extension != "") {
        $extension = '.' . $extension;
    } else
        $extension = false;
    return $extension;
}

function saveNewMovie($title, $catId, $releaseDate, $description, $director, $trailer) {
    $cn = getConnection();
    $sql = "INSERT INTO peliculas(titulo, id_genero, fecha_lanzamiento, resumen, director, youtube_trailer) VALUES(:titulo, :id_genero, :fecha_lanzamiento, :resumen, :director, :youtube_trailer)";

    $sentencia = $cn->prepare($sql);
    $sentencia->bindParam('titulo', $title, PDO::PARAM_STR);
    $sentencia->bindParam('id_genero', $catId, PDO::PARAM_INT);
    $sentencia->bindParam('fecha_lanzamiento', $releaseDate, PDO::PARAM_STR);
    $sentencia->bindParam('resumen', $description, PDO::PARAM_STR);
    $sentencia->bindParam('director', $director, PDO::PARAM_STR);
    $sentencia->bindParam('youtube_trailer', $trailer, PDO::PARAM_STR);

    if ($sentencia->execute())
        return $cn->lastInsertId();
    else
        return false;
}

function saveMovieCast($movieId, $cast) {
    $returnValue = true;
    $cn = getConnection();
    $sql = "INSERT INTO elencos(id_pelicula, nombre) VALUES(:id_pelicula, :nombre)";

    foreach ($cast as $actor) {
        if (isset($actor) && $actor != '') {
            $sentencia = $cn->prepare($sql);
            $sentencia->bindParam('nombre', $actor, PDO::PARAM_STR);
            $sentencia->bindParam('id_pelicula', $movieId, PDO::PARAM_INT);

            $returnValue = $returnValue && $sentencia->execute();
        }
    }

    return $returnValue;
}


