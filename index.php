<?php
require_once('./utils/sessionManager.php');
require_once('./utils/database.php');
$db = new DB();
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $user = $db->getUserById($id_user);
}
$categories = $db->getCategories();
if (isset($_GET['category'])) {
    $active_category = $_GET['category'];
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./build/stylesheets/index.css" />
    <title>Atlata</title>
</head>

<body class="dark">
    <nav class="navbar">
        <a href="./index.html">
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

        <header class="header">
            <div class="header__top-header">
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
                                    <img class="header__profile-pfp" src="./data/pfp/<?=$user['pfp']?>" alt="">
                                <?php else : ?> 
                                    <img class="header__profile-pfp" src="./assets/img/png/default-pfp.png" alt="">
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="header__categories-wrapper">
                <ul class="header__categories">
                    
                        <li class="header__categories-item <?php if (!$active_category) { ?>
                    active<?php } ?>"><a href="index.php">Все</a></li>
                        <?php
                        foreach ($categories as $category) : ?>
                            <li class="header__categories-item <?php if ($category['id_category'] == $active_category) { ?>active<?php } ?>"><a href="./index.php?category=<?=$category['id_category']?>"><?= $category['name'] ?></a></li>
                        <?php endforeach; ?>
                </ul>
            </div>
        </header>

        <main class="main">
            <div class="main__videos-container">
                <div class="main__video-item video-item">
                    <div class="video-item__preview">
                        <a href="./video.html">
                            <img src="./assets/img/png/preview.png" alt="" class="video-item__img">
                        </a>
                        <time class="video-item__time">16:10</time>
                    </div>
                    <div class="video-item__footer">
                        <div class="video-item__pfp-wrapper">
                            <a href="./channel.html" class="video-item__pfp-link">
                                <img src="./assets/img/png/test-pfp.png" alt="" class="video-item__pfp">
                            </a>
                        </div>
                        <div class="video-item__descr-wrapper">
                            <a href="./video.html">

                                <h3 class="video-item__title">ПОВТОРИЛ САМЫЕ РЕДКИЕ БУРГЕРЫ В МИРЕ ИЗ McDonal...</h3>
                            </a>
                            <p class="video-item__username">
                                <a href="./channel.html" class="video-item__username-link">vanzai</a>
                            </p>
                            <p class="video-item__statistics">
                                87 тыс. просмотров | 2 дня назад
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


                <div class="main__video-item video-item">
                    <div class="video-item__preview">
                        <a href="./video.html">
                            <img src="./assets/img/png/preview.png" alt="" class="video-item__img">
                        </a>
                        <time class="video-item__time">16:10</time>
                    </div>
                    <div class="video-item__footer">
                        <div class="video-item__pfp-wrapper">
                            <a href="./channel.html" class="video-item__pfp-link">
                                <img src="./assets/img/png/test-pfp.png" alt="" class="video-item__pfp">
                            </a>
                        </div>
                        <div class="video-item__descr-wrapper">
                            <a href="./video.html">

                                <h3 class="video-item__title">ПОВТОРИЛ САМЫЕ РЕДКИЕ БУРГЕРЫ В МИРЕ ИЗ McDonal...</h3>
                            </a>
                            <p class="video-item__username">
                                <a href="./channel.html" class="video-item__username-link">vanzai</a>
                            </p>
                            <p class="video-item__statistics">
                                87 тыс. просмотров | 2 дня назад
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

                <div class="main__video-item video-item">
                    <div class="video-item__preview">
                        <a href="./video.html">
                            <img src="./assets/img/png/preview.png" alt="" class="video-item__img">
                        </a>
                        <time class="video-item__time">16:10</time>
                    </div>
                    <div class="video-item__footer">
                        <div class="video-item__pfp-wrapper">
                            <a href="./channel.html" class="video-item__pfp-link">
                                <img src="./assets/img/png/test-pfp.png" alt="" class="video-item__pfp">
                            </a>
                        </div>
                        <div class="video-item__descr-wrapper">
                            <a href="./video.html">

                                <h3 class="video-item__title">ПОВТОРИЛ САМЫЕ РЕДКИЕ БУРГЕРЫ В МИРЕ ИЗ McDonal...</h3>
                            </a>
                            <p class="video-item__username">
                                <a href="./channel.html" class="video-item__username-link">vanzai</a>
                            </p>
                            <p class="video-item__statistics">
                                87 тыс. просмотров | 2 дня назад
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

                <div class="main__video-item video-item">
                    <div class="video-item__preview">
                        <a href="./video.html">
                            <img src="./assets/img/png/preview.png" alt="" class="video-item__img">
                        </a>
                        <time class="video-item__time">16:10</time>
                    </div>
                    <div class="video-item__footer">
                        <div class="video-item__pfp-wrapper">
                            <a href="./channel.html" class="video-item__pfp-link">
                                <img src="./assets/img/png/test-pfp.png" alt="" class="video-item__pfp">
                            </a>
                        </div>
                        <div class="video-item__descr-wrapper">
                            <a href="./video.html">

                                <h3 class="video-item__title">ПОВТОРИЛ САМЫЕ РЕДКИЕ БУРГЕРЫ В МИРЕ ИЗ McDonal...</h3>
                            </a>
                            <p class="video-item__username">
                                <a href="./channel.html" class="video-item__username-link">vanzai</a>
                            </p>
                            <p class="video-item__statistics">
                                87 тыс. просмотров | 2 дня назад
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

                <div class="main__video-item video-item">
                    <div class="video-item__preview">
                        <a href="./video.html">
                            <img src="./assets/img/png/preview.png" alt="" class="video-item__img">
                        </a>
                        <time class="video-item__time">16:10</time>
                    </div>
                    <div class="video-item__footer">
                        <div class="video-item__pfp-wrapper">
                            <a href="./channel.html" class="video-item__pfp-link">
                                <img src="./assets/img/png/test-pfp.png" alt="" class="video-item__pfp">
                            </a>
                        </div>
                        <div class="video-item__descr-wrapper">
                            <a href="./video.html">

                                <h3 class="video-item__title">ПОВТОРИЛ САМЫЕ РЕДКИЕ БУРГЕРЫ В МИРЕ ИЗ McDonal...</h3>
                            </a>
                            <p class="video-item__username">
                                <a href="./channel.html" class="video-item__username-link">vanzai</a>
                            </p>
                            <p class="video-item__statistics">
                                87 тыс. просмотров | 2 дня назад
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


                <div class="main__video-item video-item">
                    <div class="video-item__preview">
                        <a href="./video.html">
                            <img src="./assets/img/png/preview.png" alt="" class="video-item__img">
                        </a>
                        <time class="video-item__time">16:10</time>
                    </div>
                    <div class="video-item__footer">
                        <div class="video-item__pfp-wrapper">
                            <a href="./channel.html" class="video-item__pfp-link">
                                <img src="./assets/img/png/test-pfp.png" alt="" class="video-item__pfp">
                            </a>
                        </div>
                        <div class="video-item__descr-wrapper">
                            <a href="./video.html">

                                <h3 class="video-item__title">ПОВТОРИЛ САМЫЕ РЕДКИЕ БУРГЕРЫ В МИРЕ ИЗ McDonal...</h3>
                            </a>
                            <p class="video-item__username">
                                <a href="./channel.html" class="video-item__username-link">vanzai</a>
                            </p>
                            <p class="video-item__statistics">
                                87 тыс. просмотров | 2 дня назад
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

                <div class="main__video-item video-item">
                    <div class="video-item__preview">
                        <a href="./video.html">
                            <img src="./assets/img/png/preview.png" alt="" class="video-item__img">
                        </a>
                        <time class="video-item__time">16:10</time>
                    </div>
                    <div class="video-item__footer">
                        <div class="video-item__pfp-wrapper">
                            <a href="./channel.html" class="video-item__pfp-link">
                                <img src="./assets/img/png/test-pfp.png" alt="" class="video-item__pfp">
                            </a>
                        </div>
                        <div class="video-item__descr-wrapper">
                            <a href="./video.html">

                                <h3 class="video-item__title">ПОВТОРИЛ САМЫЕ РЕДКИЕ БУРГЕРЫ В МИРЕ ИЗ McDonal...</h3>
                            </a>
                            <p class="video-item__username">
                                <a href="./channel.html" class="video-item__username-link">vanzai</a>
                            </p>
                            <p class="video-item__statistics">
                                87 тыс. просмотров | 2 дня назад
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

                <div class="main__video-item video-item">
                    <div class="video-item__preview">
                        <a href="./video.html">
                            <img src="./assets/img/png/preview.png" alt="" class="video-item__img">
                        </a>
                        <time class="video-item__time">16:10</time>
                    </div>
                    <div class="video-item__footer">
                        <div class="video-item__pfp-wrapper">
                            <a href="./channel.html" class="video-item__pfp-link">
                                <img src="./assets/img/png/test-pfp.png" alt="" class="video-item__pfp">
                            </a>
                        </div>
                        <div class="video-item__descr-wrapper">
                            <a href="./video.html">

                                <h3 class="video-item__title">ПОВТОРИЛ САМЫЕ РЕДКИЕ БУРГЕРЫ В МИРЕ ИЗ McDonal...</h3>
                            </a>
                            <p class="video-item__username">
                                <a href="./channel.html" class="video-item__username-link">vanzai</a>
                            </p>
                            <p class="video-item__statistics">
                                87 тыс. просмотров | 2 дня назад
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

            </div>
        </main>

    </div>
</body>

</html>