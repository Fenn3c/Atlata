<?php
require_once('./utils/sessionManager.php');
require_once('./utils/database.php');
$db = new DB();
$user = null;
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $user = $db->getUserById($id_user);
}
if (isset($_GET['video'])) {
    if($id_user){
        $db->addView($id_user, $_GET['video']);
    }
    $id_video = strip_tags($_GET['video']);
    $video = $db->getVideoById($id_video);
    $suggestions = $db->getSuggestions($id_video);
    $comments = $db->getComments($id_video);
    if (!$video)
        header('Location: index.php');
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Видео</title>
    <link rel="stylesheet" href="./build/stylesheets/video.css" />
</head>

<body>

    <div class="container">

        <header class="header">
            <div class="header__top-header">
                <a href="./index.php">
                    <img src="./assets/img/svg/logotype.svg" alt="" class="header__logotype">
                </a>

                <form class="header__search">

                    <label for="search" class="header__search-label">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.1924 16.3103C12.356 17.616 10.0963 18.1841 7.86085 17.902C5.62544 17.6199 3.57757 16.5083 2.12309 14.7874C0.668612 13.0664 -0.0863192 10.8618 0.00791453 8.61051C0.102148 6.35916 1.03867 4.22538 2.63187 2.63204C4.22507 1.03871 6.35868 0.102111 8.60983 0.00786941C10.861 -0.0863722 13.0654 0.668621 14.7862 2.12322C16.507 3.57782 17.6185 5.62586 17.9006 7.86145C18.1826 10.097 17.6145 12.357 16.309 14.1935L23.5234 21.4065C23.6705 21.5436 23.7885 21.709 23.8704 21.8927C23.9523 22.0764 23.9963 22.2748 23.9998 22.4759C24.0034 22.677 23.9664 22.8767 23.891 23.0632C23.8157 23.2497 23.7036 23.4191 23.5614 23.5613C23.4192 23.7035 23.2498 23.8157 23.0633 23.891C22.8768 23.9663 22.6771 24.0033 22.476 23.9998C22.2749 23.9962 22.0766 23.9522 21.8929 23.8703C21.7092 23.7885 21.5439 23.6705 21.4068 23.5233L14.1924 16.3103ZM14.9771 8.98541C14.9771 7.39652 14.346 5.87272 13.2226 4.74921C12.0991 3.6257 10.5755 2.99452 8.9867 2.99452C7.39795 2.99452 5.87427 3.6257 4.75086 4.74921C3.62744 5.87272 2.99631 7.39652 2.99631 8.98541C2.99631 10.5743 3.62744 12.0981 4.75086 13.2216C5.87427 14.3451 7.39795 14.9763 8.9867 14.9763C10.5755 14.9763 12.0991 14.3451 13.2226 13.2216C14.346 12.0981 14.9771 10.5743 14.9771 8.98541Z" fill="#4D5777" />
                        </svg>
                    </label>
                    <input name="search" id="search" type="text" class="header__input" placeholder="Напишите название видео или плейлиста...">
                </form>
                <div class="header__left">

                    <button class="header__options-btn">
                        <svg viewBox="0 0 8 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.733.008A4.017 4.017 0 0 0 .804 1.597C.399 2.13.148 2.739.036 3.453c-.04.261-.04.833 0 1.094.171 1.097.702 1.997 1.562 2.65a4.024 4.024 0 0 0 1.855.767c.261.04.833.04 1.094 0 .972-.152 1.798-.59 2.418-1.283.55-.614.868-1.293.999-2.134.04-.261.04-.833 0-1.094a4.024 4.024 0 0 0-.767-1.855A3.996 3.996 0 0 0 4.5.033a6.401 6.401 0 0 0-.767-.025m0 12a4.017 4.017 0 0 0-2.929 1.589c-.405.533-.656 1.142-.768 1.856-.04.261-.04.833 0 1.094.171 1.097.702 1.997 1.562 2.65a4.024 4.024 0 0 0 1.855.767c.261.04.833.04 1.094 0 .972-.152 1.798-.59 2.418-1.283.55-.614.868-1.293.999-2.134.04-.261.04-.833 0-1.094a4.024 4.024 0 0 0-.767-1.855A3.996 3.996 0 0 0 4.5 12.033a6.401 6.401 0 0 0-.767-.025m0 12a4.017 4.017 0 0 0-2.929 1.589c-.405.533-.656 1.142-.768 1.856-.04.261-.04.833 0 1.094.171 1.097.702 1.997 1.562 2.65a4.024 4.024 0 0 0 1.855.767c.261.04.833.04 1.094 0 .972-.152 1.798-.59 2.418-1.283.55-.614.868-1.293.999-2.134.04-.261.04-.833 0-1.094a4.024 4.024 0 0 0-.767-1.855A3.996 3.996 0 0 0 4.5 24.033a6.401 6.401 0 0 0-.767-.025" fill="#4D5777" fill-rule="evenodd" />
                        </svg>
                    </button>
                    <?php if (!$user) : ?>
                        <form class="header__authentication">
                            <a href="./login.php" class="header__login-btn">
                                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M31 15.9845C31 7.43625 24.056 0.5 15.5 0.5C6.944 0.5 0 7.43625 0 15.9845C0 20.6926 2.139 24.9357 5.487 27.7839C5.518 27.8149 5.549 27.8149 5.549 27.8459C5.828 28.0629 6.107 28.2799 6.417 28.4969C6.572 28.5899 6.696 28.7119 6.851 28.8359C9.41251 30.5726 12.4362 31.5007 15.531 31.5C18.6257 31.5007 21.6495 30.5726 24.211 28.8359C24.366 28.7429 24.49 28.6209 24.645 28.5259C24.924 28.3109 25.234 28.0939 25.513 27.8769C25.544 27.8459 25.575 27.8459 25.575 27.8149C28.861 24.9338 31 20.6926 31 15.9845ZM15.5 29.5489C12.586 29.5489 9.92 28.6189 7.719 27.0709C7.75 26.8229 7.812 26.5768 7.874 26.3288C8.05872 25.6567 8.32963 25.0113 8.68 24.4088C9.021 23.8197 9.424 23.2927 9.92 22.8278C10.385 22.3628 10.943 21.9307 11.501 21.5897C12.09 21.2487 12.71 21.0007 13.392 20.8147C14.0793 20.6294 14.7882 20.5363 15.5 20.5376C17.6131 20.5227 19.6486 21.3332 21.173 22.7968C21.886 23.5098 22.444 24.3468 22.847 25.3058C23.064 25.8638 23.219 26.4528 23.312 27.0709C21.0242 28.6793 18.2967 29.5445 15.5 29.5489ZM10.757 15.2114C10.4839 14.5861 10.3465 13.9098 10.354 13.2274C10.354 12.5474 10.478 11.8654 10.757 11.2454C11.036 10.6254 11.408 10.0693 11.873 9.60431C12.338 9.13931 12.896 8.76925 13.516 8.49025C14.136 8.21125 14.818 8.08725 15.5 8.08725C16.213 8.08725 16.864 8.21125 17.484 8.49025C18.104 8.76925 18.662 9.14125 19.127 9.60431C19.592 10.0693 19.964 10.6273 20.243 11.2454C20.522 11.8654 20.646 12.5474 20.646 13.2274C20.646 13.9404 20.522 14.5914 20.243 15.2095C19.9737 15.8203 19.5956 16.3771 19.127 16.8525C18.6514 17.3204 18.0947 17.6979 17.484 17.9666C16.203 18.493 14.766 18.493 13.485 17.9666C12.8743 17.6979 12.3176 17.3204 11.842 16.8525C11.3728 16.384 11.0036 15.825 10.757 15.2095V15.2114ZM25.141 25.4918C25.141 25.4298 25.11 25.3988 25.11 25.3368C24.8051 24.3669 24.3557 23.4486 23.777 22.6127C23.1977 21.7706 22.4858 21.028 21.669 20.4136C21.0452 19.9443 20.369 19.549 19.654 19.2356C19.9793 19.021 20.2807 18.7723 20.553 18.4936C21.0152 18.0373 21.4211 17.5273 21.762 16.9746C22.4486 15.8466 22.8031 14.5478 22.785 13.2274C22.7946 12.25 22.6047 11.2809 22.227 10.3793C21.8541 9.51061 21.3173 8.72189 20.646 8.05625C19.9757 7.39756 19.1868 6.87164 18.321 6.50625C17.4179 6.1292 16.4476 5.94 15.469 5.95019C14.4903 5.94062 13.5199 6.13047 12.617 6.50819C11.7437 6.8728 10.9529 7.40987 10.292 8.08725C9.63333 8.75682 9.1074 9.54506 8.742 10.4103C8.36428 11.3119 8.17441 12.281 8.184 13.2584C8.184 13.9404 8.277 14.5914 8.463 15.2095C8.649 15.8605 8.897 16.4495 9.238 17.0056C9.548 17.5636 9.982 18.0596 10.447 18.5246C10.726 18.8036 11.036 19.0496 11.377 19.2666C10.6598 19.5884 9.98339 19.9942 9.362 20.4756C8.556 21.0956 7.843 21.8377 7.254 22.6437C6.66938 23.4761 6.21953 24.3954 5.921 25.3678C5.89 25.4298 5.89 25.4918 5.89 25.5228C3.441 23.0448 1.922 19.7006 1.922 15.9845C1.922 8.52125 8.029 2.42006 15.5 2.42006C22.971 2.42006 29.078 8.52125 29.078 15.9845C29.0739 19.5494 27.6584 22.9677 25.141 25.4918Z" />
                                </svg> Войти
                            </a>
                        </form>
                    <?php else : ?>
                        <a href="./profile.php">
                            <div class="header__profile">
                                <?php if ($user['pfp']) : ?>
                                    <img class="header__profile-pfp" src="./data/pfp/<?= $user['pfp'] ?>" alt="">
                                <?php else : ?>
                                    <img class="header__profile-pfp" src="./assets/img/png/default-pfp.png" alt="">
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </header>

        <main class="main">
            <div class="main__video-container">

                <div class="main__video-wrapper video">
                    <video id="video" class="video__source" loop>
                        <source src="./data/video/<?= $video['file'] ?>">
                    </video>
                    <div id="controls-wrap" class="video__controls">
                        <div id="pauseable" class="video__pauseable"></div>
                        <button id="play" class="video__play-btn">
                            <svg width="64" height="69" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M59.123 26.112c6.461 3.565 6.461 12.852 0 16.417L13.935 67.46C7.687 70.908.031 66.388.031 59.252V9.388c0-7.136 7.656-11.655 13.904-8.208l45.188 24.932z" fill="#4E76B3" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M59.367 41.94c6.178-3.429 6.178-12 0-15.43-6.24-3.463-13.57 2.467-11.087 8.969l1.145 2.998c1.478 3.87 6.228 5.524 9.942 3.463zm-25.792 4.648c5.402 0 9.228-5.072 7.55-10.008l-4.896-14.393c-.421-1.237-1.621-2.073-2.975-2.073-1.4 0-2.628.892-3.01 2.185l-4.31 14.565c-1.441 4.876 2.368 9.724 7.64 9.724zm-8.05 14.134c3.644-2.022 2.15-7.378-2.057-7.378-1.741 0-3.294 1.054-3.876 2.631-1.28 3.465 2.62 6.585 5.932 4.747zm-15-2.253C8.452 63.897 1.05 66.602.115 60.89A8.854 8.854 0 0 1 0 59.46V8.992C0 2.134 7.722-2.152 13.9 1.277L20.7 5.05c4.879 2.708 7.023 8.398 5.081 13.481L10.525 58.47z" fill="#5D95EA" />
                            </svg>
                        </button>
                        <div class="video__controls-menu">
                            <div class="video__progress-wrapper">
                                <input type="range" id="video-progress" class="video__progress" value="0" max="100">
                            </div>
                            <div class="video__controls-bottom">

                                <div class="video__controls-left">
                                    <button id="play-small" class="video__play-btn-small">
                                        <svg viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.38519 3.69764C4.48374 3.21582 3.54547 3.89899 3.54547 4.67818V20.1317C3.54547 20.9109 4.48375 21.5941 5.38519 21.1123L19.8413 13.3855C20.6589 12.9485 20.6589 11.8614 19.8413 11.4244L5.3852 3.69764C5.3852 3.69764 5.3852 3.69764 5.38519 3.69764ZM0 4.67818C0 1.03415 3.96011 -1.08419 7.05648 0.570797L7.05648 0.5708L21.5126 8.29757C24.8291 10.0703 24.8291 14.7396 21.5126 16.5123L7.05648 24.2391L6.28086 22.788L7.05648 24.2391C3.96011 25.8941 0 23.7757 0 20.1317V4.67818Z" fill="#5093F6" />
                                        </svg>

                                    </button>
                                    <button id="stop-small" class="video__play-btn-small hidden">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="6" height="24" rx="3" />
                                            <rect x="18" width="6" height="24" rx="3" />
                                        </svg>


                                    </button>
                                    <button id="volume" class="video__volume-btn">
                                        <svg viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M23.905 7.173a1.336 1.336 0 0 0-2.079 1.679 5.33 5.33 0 0 1 0 6.315 1.333 1.333 0 0 0 1.04 2.171 1.332 1.332 0 0 0 1.039-.492 7.994 7.994 0 0 0 0-9.673zM18.163.178a1.332 1.332 0 0 0-1.333 0l-8.62 5.93H1.55A1.332 1.332 0 0 0 .217 7.438v9.14a1.332 1.332 0 0 0 1.332 1.332H8.21l8.54 5.862c.234.152.508.23.786.227a1.332 1.332 0 0 0 1.333-1.332V1.35a1.331 1.331 0 0 0-.706-1.173zm-1.959 19.958-6.795-4.663c-.224-.15-.489-.23-.76-.226H2.882V8.772H8.65c.27.003.535-.076.76-.227l6.794-4.663v16.254z" />
                                        </svg>
                                    </button>
                                    <button id="volume-off" class="video__volume-btn hidden">
                                        <svg viewBox="0 0 30 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.946.846a1.333 1.333 0 0 0-1.332 0l-8.62 5.928H1.332A1.332 1.332 0 0 0 0 8.107v9.14a1.332 1.332 0 0 0 1.332 1.331h6.662l8.54 5.863c.234.15.507.23.786.226a1.333 1.333 0 0 0 1.332-1.332V2.018a1.333 1.333 0 0 0-.706-1.172zm-1.959 19.957L9.194 16.14c-.224-.15-.49-.23-.76-.226H2.665V9.439h5.768c.27.003.536-.076.76-.227l6.795-4.663v16.254z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.563 8.329a1.5 1.5 0 0 1 2.108.234l1.83 2.286 1.828-2.286a1.5 1.5 0 1 1 2.342 1.874l-2.25 2.813 2.25 2.813a1.5 1.5 0 0 1-2.342 1.874L25.5 15.651l-1.829 2.286a1.5 1.5 0 0 1-2.342-1.874l2.25-2.813-2.25-2.813a1.5 1.5 0 0 1 .234-2.108z" />
                                        </svg>

                                    </button>

                                    <p id="timer" class="video__timer">00:00 / <?= $video['duration'] ?></p>
                                </div>
                                <div class="video__controls-right">
                                    <button id="settings" class="video__settings-btn">
                                        <svg viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.702 9.429a3.581 3.581 0 0 0-3.593 2.036 3.592 3.592 0 0 0 2.628 5.071 3.58 3.58 0 0 0 3.732-1.768c.364-.644.52-1.384.448-2.12a3.597 3.597 0 0 0-3.215-3.22v0zM22.332 13c-.002.39-.03.78-.085 1.166l2.532 1.988a.606.606 0 0 1 .137.771l-2.395 4.15a.606.606 0 0 1-.736.257l-2.515-1.014a.901.901 0 0 0-.85.098 9.2 9.2 0 0 1-1.206.704.893.893 0 0 0-.494.68l-.377 2.686a.622.622 0 0 1-.598.514h-4.79a.621.621 0 0 1-.6-.497L9.98 21.82a.902.902 0 0 0-.504-.685 8.69 8.69 0 0 1-1.202-.705.895.895 0 0 0-.846-.096l-2.515 1.013a.605.605 0 0 1-.735-.256l-2.396-4.15a.606.606 0 0 1 .137-.771l2.14-1.682a.9.9 0 0 0 .336-.79 7.657 7.657 0 0 1 0-1.393.898.898 0 0 0-.34-.782L1.915 9.842a.606.606 0 0 1-.132-.767l2.395-4.15a.606.606 0 0 1 .736-.257L7.43 5.682a.901.901 0 0 0 .85-.098 9.21 9.21 0 0 1 1.206-.704.893.893 0 0 0 .494-.68l.377-2.686A.621.621 0 0 1 10.954 1h4.791a.622.622 0 0 1 .599.497l.376 2.682a.902.902 0 0 0 .504.685c.419.203.82.438 1.202.705a.895.895 0 0 0 .846.096l2.515-1.013a.605.605 0 0 1 .736.256l2.395 4.15a.606.606 0 0 1-.137.771l-2.14 1.682a.9.9 0 0 0-.34.79c.02.232.032.465.032.699z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <button id="fullscreen" class="video__fullscreen-btn">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.667 4A1.333 1.333 0 0 1 4 2.667h2.667a1.333 1.333 0 0 0 0-2.667H4a4 4 0 0 0-4 4v2.667a1.333 1.333 0 0 0 2.667 0V4zm0 16A1.333 1.333 0 0 0 4 21.333h2.667a1.333 1.333 0 0 1 0 2.667H4a4 4 0 0 1-4-4v-2.667a1.333 1.333 0 0 1 2.667 0V20zM20 2.667A1.333 1.333 0 0 1 21.333 4v2.667a1.334 1.334 0 0 0 2.667 0V4a4 4 0 0 0-4-4h-2.667a1.333 1.333 0 1 0 0 2.667H20zM21.333 20A1.333 1.333 0 0 1 20 21.333h-2.667a1.333 1.333 0 1 0 0 2.667H20a4 4 0 0 0 4-4v-2.667a1.333 1.333 0 0 0-2.667 0V20z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <h1 class="main__video-title"><?= $video['title'] ?></h1>

                <p class="main__video-statistics"><?= $video['views'] ?> просмотров <?= $video['date'] ?></p>
                <p class="main__video-description"><?= $video['description'] ?></p>
                <div class="main__channel">
                    <?php if ($video['pfp']) : ?>
                        <img src="./data/pfp/<?= $video['pfp'] ?>" alt="" class="main__channel-img">
                    <?php else : ?>
                        <img src="./assets/img/png/default-pfp.png" alt="" class="main__channel-img">
                    <?php endif; ?>

                    <div class="main__channel-wrap">
                        <h3 class="main__channel-title"><?= $video['login'] ?></h3>
                        <p class="main__channel-subscriptions"><?= $video['subscribers'] ?> подпищиков</p>
                    </div>
                    <form class="main__subscribe" action="./actions/subscribe.php" method="post">
                        <input type="hidden" name="channel" value="<?=$video['id_user']?>">
                        <input type="hidden" name="back" value="../video.php?video=<?=$id_video?>">
                    <?php
                    $isSubscribed = $db->isSubscribed($_SESSION['id_user'], $video['id_user']); 
                    if($isSubscribed):
                    ?>
                        <button class="main__subscribe-btn main__subscribe-btn_unsubscribed">Отписаться</button>
                    <?php else: ?>
                        <button class="main__subscribe-btn">Подписаться</button>
                        <?php endif;?>
                    </form>
                    <div class="main__video-rating">
                        <form action="./actions/video_rating.php" method="post">
                            <input type="hidden" name="video" value="<?= $video['id_video'] ?>" />
                            <button class="main__rating-btn" type="submit" name="rating">
                                <?php
                                $rating = $db->getRating($id_user, $id_video);
                                if ($rating) :
                                    if ($rating['rating'] == 1) : ?>
                                        <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 1.2998C3.6868 1.2998 1 3.959 1 7.2398C1 9.8882 2.05 16.1738 12.3856 22.5278C12.5707 22.6405 12.7833 22.7001 13 22.7001C13.2167 22.7001 13.4293 22.6405 13.6144 22.5278C23.95 16.1738 25 9.8882 25 7.2398C25 3.959 22.3132 1.2998 19 1.2998C15.6868 1.2998 13 4.8998 13 4.8998C13 4.8998 10.3132 1.2998 7 1.2998Z" fill="#5093F6" stroke="#5093F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    <?php else : ?>
                                        <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 1.29993C3.6868 1.29993 1 3.95913 1 7.23993C1 9.88833 2.05 16.1739 12.3856 22.5279C12.5707 22.6406 12.7833 22.7002 13 22.7002C13.2167 22.7002 13.4293 22.6406 13.6144 22.5279C23.95 16.1739 25 9.88833 25 7.23993C25 3.95913 22.3132 1.29993 19 1.29993C15.6868 1.29993 13 4.89993 13 4.89993C13 4.89993 10.3132 1.29993 7 1.29993Z" stroke="#5093F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    <?php endif; ?>

                                <?php else : ?>
                                    <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 1.29993C3.6868 1.29993 1 3.95913 1 7.23993C1 9.88833 2.05 16.1739 12.3856 22.5279C12.5707 22.6406 12.7833 22.7002 13 22.7002C13.2167 22.7002 13.4293 22.6406 13.6144 22.5279C23.95 16.1739 25 9.88833 25 7.23993C25 3.95913 22.3132 1.29993 19 1.29993C15.6868 1.29993 13 4.89993 13 4.89993C13 4.89993 10.3132 1.29993 7 1.29993Z" stroke="#5093F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                <?php endif; ?>
                            </button>
                        </form>
                        <p><?= $video['rating'] ?></p>
                    </div>

                </div>
                <hr class="main__hr">
                <h3 class="main__comments-title">Комментарии</h3>
                <div class="main__send-comment">
                    <?php if ($user['pfp']) : ?>
                        <img class="main__send-comment-pfp" src="./data/pfp/<?= $user['pfp'] ?>" alt="">
                    <?php else : ?>
                        <img class="main__send-comment-pfp" src="./assets/img/png/default-pfp.png" alt="">
                    <?php endif; ?>

                    <form class="main__send-comment-form" action="./actions/send_comment.php" method="post">
                        <input type="hidden" name="video" value="<?= $id_video ?>">
                        <input name="text" type="text" class="main__send-comment-input" placeholder="Напишите здесь что-нибудь...">
                        <button class="main__send-comment-btn">Отправить</button>
                    </form>
                </div>
                <?php foreach ($comments as $comment) : ?>
                    <div class="main__comments">
                        <div class="main__comment">
                            <?php if ($comment['pfp']) : ?>
                                <img class="main__comment-pfp" src="./data/pfp/<?= $user['pfp'] ?>" alt="">
                            <?php else : ?>
                                <img class="main__comment-pfp" src="./assets/img/png/default-pfp.png" alt="">
                            <?php endif; ?>

                            <div class="main__comment-wrapper">
                                <div class="main__comment-up">
                                    <p class="main__comment-author"><?= $comment['login'] ?></p>
                                    <p class="main__comment-date"><?= $comment['date'] ?></p>
                                </div>
                                <p class="main__comment-content">
                                    <?= $comment['content'] ?>
                                </p>
                                <div class="main__comment-likes">

                                <form action="./actions/comment_rating.php" method="post">
                                    <input type="hidden" name="video" value="<?=$id_video?>">
                                    <input type="hidden" name="comment" value="<?=$comment['id_comment']?>">
                                    <button class="main__rating-btn" type="submit" name="rating">
                                        <?php
                                    $comment_rating = $db->getCommentRating($id_user, $comment['id_comment']);
                                    if ($comment_rating) :
                                        if ($comment_rating['rating'] == 1) : ?>
                                            <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 1.2998C3.6868 1.2998 1 3.959 1 7.2398C1 9.8882 2.05 16.1738 12.3856 22.5278C12.5707 22.6405 12.7833 22.7001 13 22.7001C13.2167 22.7001 13.4293 22.6405 13.6144 22.5278C23.95 16.1738 25 9.8882 25 7.2398C25 3.959 22.3132 1.2998 19 1.2998C15.6868 1.2998 13 4.8998 13 4.8998C13 4.8998 10.3132 1.2998 7 1.2998Z" fill="#5093F6" stroke="#5093F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        <?php else : ?>
                                            <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 1.29993C3.6868 1.29993 1 3.95913 1 7.23993C1 9.88833 2.05 16.1739 12.3856 22.5279C12.5707 22.6406 12.7833 22.7002 13 22.7002C13.2167 22.7002 13.4293 22.6406 13.6144 22.5279C23.95 16.1739 25 9.88833 25 7.23993C25 3.95913 22.3132 1.29993 19 1.29993C15.6868 1.29993 13 4.89993 13 4.89993C13 4.89993 10.3132 1.29993 7 1.29993Z" stroke="#5093F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        <?php endif; ?>

                                        <?php else : ?>
                                        <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 1.29993C3.6868 1.29993 1 3.95913 1 7.23993C1 9.88833 2.05 16.1739 12.3856 22.5279C12.5707 22.6406 12.7833 22.7002 13 22.7002C13.2167 22.7002 13.4293 22.6406 13.6144 22.5279C23.95 16.1739 25 9.88833 25 7.23993C25 3.95913 22.3132 1.29993 19 1.29993C15.6868 1.29993 13 4.89993 13 4.89993C13 4.89993 10.3132 1.29993 7 1.29993Z" stroke="#5093F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    <?php endif; ?>
                                </button>
                            </form>
                                    <p class="main__comment-likes-count"><?= $comment['rating'] ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="main__suggestions">
                <?php foreach ($suggestions as $suggestion) : ?>
                    <div class="main__video-item video-item">
                        <div class="video-item__preview">
                            <a href="./video.php?video=<?= $suggestion['id_video'] ?>">
                                <img src="./data/thumbnails/<?= $suggestion['thumbnail'] ?>" alt="" class="video-item__img">
                            </a>
                            <time class="video-item__time"><?= $suggestion['duration'] ?></time>
                        </div>
                        <div class="video-item__footer">
                            <div class="video-item__pfp-wrapper">
                                <a href="./channel.php<?= $suggestion['id_user'] ?>" class="video-item__item__pfp-link">
                                    <?php if ($suggestion['pfp']) : ?>
                                        <img src="./data/pfp/<?= $suggestion['pfp'] ?>" alt="" class="video-item__pfp">
                                    <?php else : ?>
                                        <img src="./assets/img/png/default-pfp.png" alt="" class="video-item__pfp">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="video-item__descr-wrapper">
                                <a href="./video.php?video=<?= $suggestion['id_video'] ?>">
                                    <h3 class="video-item__title"><?= $suggestion['title'] ?></h3>
                                </a>
                                <p class="video-item__username">
                                    <a href="./channel.php<?= $suggestion['id_user'] ?>" class="video-item__username-link"><?= $video['login'] ?></a>
                                </p>
                                <p class="video-item__statistics">
                                    <?= $suggestion['views'] ?> просмотров | <?= $suggestion['date'] ?>
                                </p>
                            </div>

                            <div class="video-item__more">
                                <button class="video-item__more-btn">
                                    <svg width="4" height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 16a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0-6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0-6a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>



            </div>
        </main>
    </div>

    <script src="./assets/scripts/video-player.js">
    </script>
</body>

</html>