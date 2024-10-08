<?php
require_once('./utils/sessionManager.php');
require_once('./utils/database.php');
if (isset($_GET['channel'])) {
    $db = new DB();
    $id_channel = $_GET['channel'];
    $channel = $db->getUserById($id_channel);
    $videos = $db->getVideosByChannel($id_channel);
} else {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Канал</title>
    <link rel="stylesheet" href="build/stylesheets/channel.css">
</head>

<body>
    <nav class="navbar">
        <a href="./index.php">
            <img src="./assets/img/svg/logotype.svg" alt="" class="navbar__logotype">
        </a>
        <button class="navbar__more-btn">
            <svg viewBox="0 0 32 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 1.92308C0 0.860991 0.859613 0 1.92 0H30.08C31.1404 0 32 0.860991 32 1.92308C32 2.98516 31.1404 3.84615 30.08 3.84615H1.92C0.859613 3.84615 0 2.98516 0 1.92308ZM0 12.5C0 11.4379 0.859613 10.5769 1.92 10.5769H30.08C31.1404 10.5769 32 11.4379 32 12.5C32 13.5621 31.1404 14.4231 30.08 14.4231H1.92C0.859613 14.4231 0 13.5621 0 12.5ZM0 23.0769C0 22.0148 0.859613 21.1538 1.92 21.1538H30.08C31.1404 21.1538 32 22.0148 32 23.0769C32 24.139 31.1404 25 30.08 25H1.92C0.859613 25 0 24.139 0 23.0769Z" />
            </svg></button>
        <ul class="navbar__categories-list">
            <li class="navbar__categories-item"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.1043 8.0381C16.0121 8.00412 15.913 7.99263 15.8153 8.0046C15.7177 8.01657 15.6244 8.05165 15.5435 8.10685C15.4626 8.16204 15.3965 8.23571 15.3509 8.32154C15.3052 8.40737 15.2813 8.50282 15.2813 8.59973V18.3017C14.7182 17.8579 14.0212 17.611 13.3 17.6001C12.5788 17.5892 11.8744 17.8148 11.2978 18.2414C10.7211 18.668 10.305 19.2713 10.1149 19.9564C9.92481 20.6415 9.97157 21.3694 10.2478 22.0255C10.5241 22.6815 11.0141 23.2285 11.6407 23.5801C12.2674 23.9318 12.995 24.0682 13.709 23.9679C14.4231 23.8676 15.083 23.5363 15.5847 23.0261C16.0865 22.5159 16.4016 21.8558 16.4805 21.1499C16.4934 21.101 16.4999 21.0507 16.5 21.0003V13.4655L22.1769 15.5616C22.2691 15.5956 22.3683 15.6071 22.4659 15.5951C22.5636 15.5832 22.6568 15.5481 22.7377 15.4929C22.8186 15.4377 22.8847 15.364 22.9304 15.2782C22.9761 15.1924 23 15.0969 23 15V12.3863C23.0001 11.8569 22.8361 11.34 22.5299 10.9048C22.2237 10.4696 21.7899 10.1369 21.2864 9.95099L16.1043 8.0381Z" />
                </svg>

            </li>
            <li class="navbar__categories-item"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.8889 8H8.88889C7.84711 8 7 8.79733 7 9.77778V22.2222C7 23.2027 7.84711 24 8.88889 24H22.8889C23.9307 24 24.7778 23.2027 24.7778 22.2222V9.77778C24.7778 8.79733 23.9307 8 22.8889 8ZM22.8889 22.2222H8.88889C8.83822 22.2222 8.80356 22.208 8.78844 22.208C8.78222 22.208 8.77867 22.2098 8.77778 22.2151L8.76711 9.81867C8.77333 9.80978 8.81333 9.77778 8.88889 9.77778H22.8889C22.9591 9.77867 22.9973 9.80267 23 9.78489L23.0107 22.1813C23.0044 22.1902 22.9644 22.2222 22.8889 22.2222Z" />
                    <path d="M10.5557 11.5557H15.889V16.889H10.5557V11.5557ZM16.7779 18.6668H10.5557V20.4446H21.2223V18.6668H17.6668H16.7779ZM17.6668 15.1112H21.2223V16.889H17.6668V15.1112ZM17.6668 11.5557H21.2223V13.3334H17.6668V11.5557Z" />
                </svg>

            </li>
            <li class="navbar__categories-item"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23 8H8.77778C7.79733 8 7 8.79733 7 9.77778V22.2222C7 23.2027 7.79733 24 8.77778 24H23C23.9804 24 24.7778 23.2027 24.7778 22.2222V9.77778C24.7778 8.79733 23.9804 8 23 8ZM23.0009 13.3333C23 13.3333 23 13.3333 23.0009 13.3333H22.5867L20.216 9.77778H23L23.0009 13.3333ZM13.6978 13.3333L11.3271 9.77778H13.6356L16.0062 13.3333H13.6978ZM18.1422 13.3333L15.7716 9.77778H18.08L20.4507 13.3333H18.1422ZM8.77778 9.77778H9.19111L11.5618 13.3333H8.77778V9.77778ZM8.77778 22.2222V15.1111H23L23.0018 22.2222H8.77778Z" />
                </svg>

            </li>
            <li class="navbar__categories-item"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.7335 13.0667H16.5335V10.9334H22.4002C22.6123 10.9331 22.8157 10.8488 22.9657 10.6988C23.1156 10.5488 23.2 10.3455 23.2002 10.1334V8H22.1336V9.8667H16.2668C16.0547 9.86693 15.8513 9.9513 15.7014 10.1013C15.5514 10.2513 15.467 10.4546 15.4668 10.6667V13.0667H12.2667C11.1355 13.068 10.051 13.518 9.25111 14.3179C8.45122 15.1177 8.00128 16.2023 8 17.3335V20.6986C8.00091 21.5033 8.32095 22.2747 8.88992 22.8437C9.45889 23.4126 10.2303 23.7327 11.0349 23.7336H11.0949C11.54 23.7342 11.9797 23.6366 12.3828 23.4479C12.7858 23.2591 13.1423 22.9838 13.4268 22.6416L15.1834 20.5335H16.8044L18.56 22.8157C18.9464 23.318 19.4805 23.6868 20.0871 23.8702C20.6938 24.0536 21.3426 24.0424 21.9426 23.8383C22.5426 23.6343 23.0637 23.2474 23.4327 22.7322C23.8018 22.2169 24.0002 21.5991 24.0003 20.9653V17.3335C23.999 16.2023 23.549 15.1177 22.7491 14.3179C21.9493 13.518 20.8647 13.068 19.7335 13.0667ZM22.9336 20.9653C22.9336 21.3764 22.8049 21.7771 22.5655 22.1113C22.3262 22.4455 21.9882 22.6963 21.5991 22.8287C21.2099 22.961 20.7891 22.9682 20.3956 22.8493C20.0022 22.7303 19.6558 22.4911 19.4052 22.1653L17.3294 19.4668H14.6836L12.6071 21.9587C12.4227 22.1806 12.1915 22.3592 11.9301 22.4816C11.6688 22.604 11.3837 22.6673 11.095 22.6669H11.035C10.5132 22.6663 10.0129 22.4588 9.64385 22.0898C9.27484 21.7208 9.06727 21.2205 9.06668 20.6986V17.3335C9.06764 16.4851 9.40509 15.6717 10.005 15.0718C10.6049 14.4718 11.4183 14.1344 12.2667 14.1334H19.7335C20.5819 14.1344 21.3953 14.4718 21.9952 15.0718C22.5952 15.6717 22.9326 16.4851 22.9336 17.3335V20.9653Z" />
                    <path d="M19.4668 15.7334H20.5335V16.8001H19.4668V15.7334ZM19.4668 18.4001H20.5335V19.4668H19.4668V18.4001ZM18.1334 17.0668H19.2001V18.1334H18.1334V17.0668ZM20.8001 17.0668H21.8668V18.1334H20.8001V17.0668ZM12.5333 15.7334H11.4667V17.0668H10.1333V18.1334H11.4667V19.4668H12.5333V18.1334H13.8667V17.0668H12.5333V15.7334Z" />
                </svg>

            </li>
            <li class="navbar__categories-item"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.376 13.776C17.4309 13.7171 17.4972 13.6698 17.5708 13.637C17.6444 13.6042 17.7238 13.5865 17.8044 13.5851C17.8849 13.5837 17.965 13.5985 18.0397 13.6287C18.1144 13.6589 18.1823 13.7038 18.2392 13.7608C18.2962 13.8177 18.3411 13.8856 18.3713 13.9603C18.4015 14.035 18.4163 14.1151 18.4149 14.1956C18.4135 14.2762 18.3958 14.3556 18.363 14.4292C18.3302 14.5028 18.2829 14.5691 18.224 14.624L14.624 18.224C14.5691 18.2829 14.5028 18.3302 14.4292 18.363C14.3556 18.3958 14.2762 18.4135 14.1956 18.4149C14.1151 18.4163 14.035 18.4015 13.9603 18.3713C13.8856 18.3411 13.8177 18.2962 13.7608 18.2392C13.7038 18.1823 13.6589 18.1144 13.6287 18.0397C13.5985 17.965 13.5837 17.8849 13.5851 17.8044C13.5865 17.7238 13.6042 17.6444 13.637 17.5708C13.6698 17.4972 13.7171 17.4309 13.776 17.376L17.376 13.776ZM20.6 8C21.5017 8 22.3665 8.35821 23.0042 8.99584C23.6418 9.63346 24 10.4983 24 11.4V12.2C24 18.7168 18.7168 24 12.2 24H11.4C10.4983 24 9.63346 23.6418 8.99584 23.0042C8.35821 22.3665 8 21.5017 8 20.6V19.8C8 13.2832 13.2832 8 19.8 8H20.6ZM22.8 11.4C22.8 10.8165 22.5682 10.2569 22.1556 9.84437C21.7431 9.43178 21.1835 9.2 20.6 9.2H19.8C19.4776 9.2 19.1584 9.2144 18.8432 9.2424L22.7576 13.1568C22.7856 12.8416 22.8 12.5224 22.8 12.2V11.4ZM22.5224 14.6192L17.3808 9.4776C15.4455 9.93277 13.6769 10.9223 12.2764 12.3334C10.8759 13.7445 9.89975 15.5205 9.4592 17.4592L14.5408 22.5408C16.4795 22.1003 18.2556 21.1243 19.6667 19.7237C21.0779 18.3232 22.0673 16.5546 22.5224 14.6192ZM9.2344 18.932C9.212 19.2184 9.2 19.508 9.2 19.8V20.6C9.2 21.1835 9.43178 21.7431 9.84437 22.1556C10.2569 22.5682 10.8165 22.8 11.4 22.8H12.2C12.492 22.8 12.7816 22.788 13.068 22.7648L9.2352 18.932H9.2344Z" />
                </svg>

            </li>
        </ul>
    </nav>
    <div class="container">
        <main class="main">
            <?php
            if(isset($_SESSION['id_user'])):
            if ($id_channel == $_SESSION['id_user']) :
            ?>
                <form action="./actions/edit_banner.php" method="post" enctype="multipart/form-data" hidden>
                    <input id="banner-input" name="banner" type="file">
                    <button type="submit" id="submit-banner"></button>
                </form>
            <?php endif; ?>
            <?php endif; ?>

            <?php if ($channel['banner']) : ?>
                <img id="banner" src="./data/banner/<?= $channel['banner'] ?>" alt="" class="main__banner">
            <?php else : ?>
                <img id="banner" src="./assets/img/png/default-banner.png" alt="" class="main__banner">
            <?php endif; ?>

            <div class="main__channel">
                <div class="main__pfp-wrapper">
                    <?php if ($channel['pfp']) : ?>
                        <img class="main__pfp" src="./data/pfp/<?= $channel['pfp'] ?>" alt="">
                    <?php else : ?>
                        <img class="main__pfp" src="./assets/img/png/default-pfp.png" alt="">
                    <?php endif; ?>
                </div>
                <div class="main__channel-wrap">
                    <div class="main__name-wrap">
                        <h3 class="main__channel-name"><?= $channel['login'] ?></h3>
                        <p class="main__subscribers"><?= $db->subscribtionsCount($channel['id_user']) ?> подпищиков</p>
                    </div>
                    <form class="main__subscribe-form" action="./actions/subscribe.php" method="post">
                        <input type="hidden" name="channel" value="<?=$id_channel?>">
                        <input type="hidden" name="back" value="../channel.php?channel=<?=$id_channel?>">
                    <?php
                    if(isset($_SESSION['id_user'])):
                    $isSubscribed = $db->isSubscribed($_SESSION['id_user'], $id_channel); 
                    if($isSubscribed):
                    ?>
                        <button class="main__subscribe-btn main__subscribe-btn_unsubscribed">Отписаться</button>
                    <?php else: ?>
                        <button class="main__subscribe-btn">Подписаться</button>
                        <?php endif;?>
                        <?php endif;?>
                    </form>

                </div>
                <div class="videos">
                    <?php foreach ($videos as $video) : ?>
                        <div class="videos__video-item video-item">
                            <div class="video-item__preview">
                                <a href="./video.php?video=<?= $video['id_video'] ?>">

                                    <img src="./data/thumbnails/<?=$video['thumbnail']?>" alt="" class="video-item__img">
                                    <time class="video-item__time"><?= $video['duration'] ?></time>
                                </a>
                            </div>
                            <div class="video-item__footer">
                                <div class="video-item__descr-wrapper">

                                    <a href="./video.php?video=<?= $video['id_video'] ?>">
                                        <h3 class="video-item__title"><?= $video['title'] ?></h3>
                                    </a>
                                    <p class="video-item__username">
                                        <a href="./channel.php?channel=<?= $id_channel ?>" class="video-item__username-link"><?= $video['login'] ?></a>
                                    </p>
                                    <p class="video-item__statistics">
                                        <?= $video['views'] ?> просмотров | <?= $video['date'] ?>
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
            </div>
        </main>
    </div>
    <script>
        const banner = document.getElementById('banner');
        const bannerInput = document.getElementById('banner-input');
        const submitBanner = document.getElementById('submit-banner');
        banner.addEventListener('click', (e) => {
            e.preventDefault();
            bannerInput.click();
        })
        bannerInput.addEventListener('change', function() {
            if (this.value)
                submitBanner.click();
        })
    </script>
</body>

</html>