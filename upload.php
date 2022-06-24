<?php
require_once('./utils/sessionManager.php');
require_once('./utils/database.php');
$db = new DB();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./build/stylesheets/upload.css">
    <title>Загрузка</title>
</head>

<body class="light">
    <nav class="navbar">
        <img src="./assets/img/svg/logotype.svg" alt="" class="navbar__logotype">
        <button class="navbar__more-btn">
            <svg viewBox="0 0 32 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 1.92308C0 0.860991 0.859613 0 1.92 0H30.08C31.1404 0 32 0.860991 32 1.92308C32 2.98516 31.1404 3.84615 30.08 3.84615H1.92C0.859613 3.84615 0 2.98516 0 1.92308ZM0 12.5C0 11.4379 0.859613 10.5769 1.92 10.5769H30.08C31.1404 10.5769 32 11.4379 32 12.5C32 13.5621 31.1404 14.4231 30.08 14.4231H1.92C0.859613 14.4231 0 13.5621 0 12.5ZM0 23.0769C0 22.0148 0.859613 21.1538 1.92 21.1538H30.08C31.1404 21.1538 32 22.0148 32 23.0769C32 24.139 31.1404 25 30.08 25H1.92C0.859613 25 0 24.139 0 23.0769Z" />
            </svg></button>
        <ul class="navbar__categories-list">
            <li class="navbar__categories-item"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 10.857a3.214 3.214 0 1 0 0 6.429 3.214 3.214 0 0 0 0-6.429zM16 16a1.929 1.929 0 1 1 0-3.858A1.929 1.929 0 0 1 16 16z" />
                    <path d="M16 7a9 9 0 1 0 9 9 9.01 9.01 0 0 0-9-9zm-3.857 15.67v-.884a1.93 1.93 0 0 1 1.928-1.929h3.858a1.93 1.93 0 0 1 1.928 1.929v.885a7.649 7.649 0 0 1-7.714 0zm8.995-.932a3.215 3.215 0 0 0-3.21-3.167h-3.857a3.215 3.215 0 0 0-3.209 3.167 7.714 7.714 0 1 1 10.276 0z" />
                </svg>

            </li>
            <li class="navbar__categories-item"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.24 10.6a.64.64 0 0 0-.64.64v7.2a.64.64 0 0 0 .64.64h.72a.8.8 0 0 1 0 1.6h-.72A2.24 2.24 0 0 1 8 18.44v-7.2A2.24 2.24 0 0 1 10.24 9h11.52A2.24 2.24 0 0 1 24 11.24v7.2a2.24 2.24 0 0 1-2.24 2.24h-.72a.8.8 0 0 1 0-1.6h.72a.64.64 0 0 0 .64-.64v-7.2a.64.64 0 0 0-.64-.64H10.24z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.488 18.545a.8.8 0 0 1 1.024 0l4.32 3.6a.8.8 0 0 1-.512 1.415h-8.64a.8.8 0 0 1-.512-1.415l4.32-3.6zM13.89 21.96h4.22L16 20.2l-2.11 1.759z" />
                </svg>


            </li>
            <li class="navbar__categories-item"><svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23 8H8.77778C7.79733 8 7 8.79733 7 9.77778V22.2222C7 23.2027 7.79733 24 8.77778 24H23C23.9804 24 24.7778 23.2027 24.7778 22.2222V9.77778C24.7778 8.79733 23.9804 8 23 8ZM23.0009 13.3333C23 13.3333 23 13.3333 23.0009 13.3333H22.5867L20.216 9.77778H23L23.0009 13.3333ZM13.6978 13.3333L11.3271 9.77778H13.6356L16.0062 13.3333H13.6978ZM18.1422 13.3333L15.7716 9.77778H18.08L20.4507 13.3333H18.1422ZM8.77778 9.77778H9.19111L11.5618 13.3333H8.77778V9.77778ZM8.77778 22.2222V15.1111H23L23.0018 22.2222H8.77778Z" />
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
                    <form class="header__authentication">
                        <a href="./login.html" class="header__login-btn">
                            <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M31 15.9845C31 7.43625 24.056 0.5 15.5 0.5C6.944 0.5 0 7.43625 0 15.9845C0 20.6926 2.139 24.9357 5.487 27.7839C5.518 27.8149 5.549 27.8149 5.549 27.8459C5.828 28.0629 6.107 28.2799 6.417 28.4969C6.572 28.5899 6.696 28.7119 6.851 28.8359C9.41251 30.5726 12.4362 31.5007 15.531 31.5C18.6257 31.5007 21.6495 30.5726 24.211 28.8359C24.366 28.7429 24.49 28.6209 24.645 28.5259C24.924 28.3109 25.234 28.0939 25.513 27.8769C25.544 27.8459 25.575 27.8459 25.575 27.8149C28.861 24.9338 31 20.6926 31 15.9845ZM15.5 29.5489C12.586 29.5489 9.92 28.6189 7.719 27.0709C7.75 26.8229 7.812 26.5768 7.874 26.3288C8.05872 25.6567 8.32963 25.0113 8.68 24.4088C9.021 23.8197 9.424 23.2927 9.92 22.8278C10.385 22.3628 10.943 21.9307 11.501 21.5897C12.09 21.2487 12.71 21.0007 13.392 20.8147C14.0793 20.6294 14.7882 20.5363 15.5 20.5376C17.6131 20.5227 19.6486 21.3332 21.173 22.7968C21.886 23.5098 22.444 24.3468 22.847 25.3058C23.064 25.8638 23.219 26.4528 23.312 27.0709C21.0242 28.6793 18.2967 29.5445 15.5 29.5489ZM10.757 15.2114C10.4839 14.5861 10.3465 13.9098 10.354 13.2274C10.354 12.5474 10.478 11.8654 10.757 11.2454C11.036 10.6254 11.408 10.0693 11.873 9.60431C12.338 9.13931 12.896 8.76925 13.516 8.49025C14.136 8.21125 14.818 8.08725 15.5 8.08725C16.213 8.08725 16.864 8.21125 17.484 8.49025C18.104 8.76925 18.662 9.14125 19.127 9.60431C19.592 10.0693 19.964 10.6273 20.243 11.2454C20.522 11.8654 20.646 12.5474 20.646 13.2274C20.646 13.9404 20.522 14.5914 20.243 15.2095C19.9737 15.8203 19.5956 16.3771 19.127 16.8525C18.6514 17.3204 18.0947 17.6979 17.484 17.9666C16.203 18.493 14.766 18.493 13.485 17.9666C12.8743 17.6979 12.3176 17.3204 11.842 16.8525C11.3728 16.384 11.0036 15.825 10.757 15.2095V15.2114ZM25.141 25.4918C25.141 25.4298 25.11 25.3988 25.11 25.3368C24.8051 24.3669 24.3557 23.4486 23.777 22.6127C23.1977 21.7706 22.4858 21.028 21.669 20.4136C21.0452 19.9443 20.369 19.549 19.654 19.2356C19.9793 19.021 20.2807 18.7723 20.553 18.4936C21.0152 18.0373 21.4211 17.5273 21.762 16.9746C22.4486 15.8466 22.8031 14.5478 22.785 13.2274C22.7946 12.25 22.6047 11.2809 22.227 10.3793C21.8541 9.51061 21.3173 8.72189 20.646 8.05625C19.9757 7.39756 19.1868 6.87164 18.321 6.50625C17.4179 6.1292 16.4476 5.94 15.469 5.95019C14.4903 5.94062 13.5199 6.13047 12.617 6.50819C11.7437 6.8728 10.9529 7.40987 10.292 8.08725C9.63333 8.75682 9.1074 9.54506 8.742 10.4103C8.36428 11.3119 8.17441 12.281 8.184 13.2584C8.184 13.9404 8.277 14.5914 8.463 15.2095C8.649 15.8605 8.897 16.4495 9.238 17.0056C9.548 17.5636 9.982 18.0596 10.447 18.5246C10.726 18.8036 11.036 19.0496 11.377 19.2666C10.6598 19.5884 9.98339 19.9942 9.362 20.4756C8.556 21.0956 7.843 21.8377 7.254 22.6437C6.66938 23.4761 6.21953 24.3954 5.921 25.3678C5.89 25.4298 5.89 25.4918 5.89 25.5228C3.441 23.0448 1.922 19.7006 1.922 15.9845C1.922 8.52125 8.029 2.42006 15.5 2.42006C22.971 2.42006 29.078 8.52125 29.078 15.9845C29.0739 19.5494 27.6584 22.9677 25.141 25.4918Z" />
                            </svg> Войти

                        </a>
                    </form>
                </div>
            </div>
        </header>
        <main class="main">
            <h1 class="main__title">Загрузка видео</h1>
            <div class="main__wrapper">
                <div id="backdrop" class="main__upload">
                    <form id="upload" name="upload" class="main__upload-form" action="" enctype="multipart/form-data">
                        <input type="file" name="video" id="video">
                        <input type="submit" name="video-submit">
                    </form>
                </div>
                <div class="main__progress-wrapper">
                    <progress id="progress" class="main__progress" value="0" max="100"></progress>
                    <p id="progress-text" class="main__progress-percent">0%</p>
                    <button id="complete-btn" class="main__complete-btn hidden" disabled>Завершить редактирование</button>
                </div>
                <div class="main__video-edit-wrapper">

                    <div class="main__video">
                        <img class="main__video-thumbnail" id="thumbnail" src="" alt="">
                        <button id="edit-thumbnail" class="main__edit-video">
                            <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M50.71.732a9.611 9.611 0 0 1 10.475 15.675L41.894 35.7a10.496 10.496 0 0 1-5.366 2.871l-8.92 1.785a3.369 3.369 0 0 1-3.964-3.962l1.782-8.92a10.513 10.513 0 0 1 2.875-5.367l19.292-19.29A9.611 9.611 0 0 1 50.71.731zm3.679 6.005a2.875 2.875 0 0 0-2.033.842l-3.053 3.053 4.066 4.064 3.052-3.052a2.874 2.874 0 0 0-2.032-4.907zm-5.783 12.722-4.066-4.064L33.065 26.87a3.774 3.774 0 0 0-1.033 1.924l-.791 3.964 3.965-.794a3.76 3.76 0 0 0 1.924-1.03L48.606 19.46z" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.105 13.473a3.368 3.368 0 0 0-3.368 3.369v37.053a3.368 3.368 0 0 0 3.368 3.368h37.053a3.368 3.368 0 0 0 3.369-3.368V43.789a3.368 3.368 0 0 1 6.737 0v10.106A10.106 10.106 0 0 1 47.158 64H10.105A10.105 10.105 0 0 1 0 53.895V16.842A10.105 10.105 0 0 1 10.105 6.736h10.106a3.368 3.368 0 1 1 0 6.737H10.105z" />
                            </svg>
                        </button>
                    </div>
                    <form method="post" action="./actions/complete_uploading.php" enctype="multipart/form-data" id="main-form" class="main__edit-video-form">
                        <input name="title" id="video-title" type="text" class="main__edit-video-input" placeholder="Введите название видео">
                        <textarea name="description" id="video-description" class="main__edit-video-textarea" placeholder="Опишите ваше видео"></textarea>
                        <select name="category" id="category-select">
                            <option value="no-category" selected>Без категории</option>
                        <?php
                        $categories = $db->getCategories(); 
                        foreach ($categories as $category):
                            if ($category['id_category'] == 0)
                                continue;
                        ?>

                            <option value="<?=$category['id_category']?>"><?=$category['name']?></option>
                            <?php endforeach; ?>
                        </select>
                        <input id="thumbnail-input" name="thumbnail" type="file" hidden>
                    </form>
                </div>
                <div class="main__option option">
                    <div class="option__wrapper">
                        <p class="option__title">название опции</p>
                        <p class="option__description">длинное и подробное описание опции</p>
                    </div>
                    <form class="option__form">

                        <input id="check1" name="check1" type="checkbox" class="option__checkbox">
                        <label for="check1" class="option__label">
                        </label>
                    </form>
                </div>
                <div class="main__option option">
                    <div class="option__wrapper">
                        <p class="option__title">название опции</p>
                        <p class="option__description">длинное и подробное описание опции</p>
                    </div>
                    <form class="option__form">

                        <input id="check2" name="check2" type="checkbox" class="option__checkbox">
                        <label for="check2" class="option__label">
                        </label>
                    </form>
                </div>
                <div class="main__option option">
                    <div class="option__wrapper">
                        <p class="option__title">название опции</p>
                        <p class="option__description">длинное и подробное описание опции</p>
                    </div>
                    <form class="option__form">

                        <input id="check3" name="check3" type="checkbox" class="option__checkbox">
                        <label for="check3" class="option__label">
                        </label>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script>
        const uploadForm = document.getElementById('upload')
        const backdrop = document.getElementById('backdrop')
        uploadForm.onsubmit = function(e) {
            const input = this.elements.video;
            const file = input.files[0];
            if (file) {
                backdrop.classList.toggle('hidden')
                upload(file);
            }
            return false;
        }


        function upload(file) {
            const progress = document.getElementById('progress')
            const progressText = document.getElementById('progress-text')

            const xhr = new XMLHttpRequest();

            xhr.upload.onprogress = function(event) {
                progress.value = event.loaded
                progress.max = event.total
                progressText.innerHTML = `${Math.floor(event.loaded / event.total * 100)}%`
            }

            xhr.onload = xhr.onerror = function() {
                if (this.status == 200) {
                    progressText.innerHTML = ''
                    document.getElementById('complete-btn').classList.remove('hidden')
                    const thumbnail = document.getElementById('thumbnail')
                    thumbnail.src = `./data/thumbnails/${this.responseText}`
                } else {
                    if (this.status == 500) {
                        alert(this.responseText)
                        backdrop.classList.toggle('hidden')
                    }
                }
            };
            var formData = new FormData(uploadForm);
            console.log(formData)
            xhr.open("POST", "./actions/upload_video.php", true);
            xhr.send(formData);

        }
    </script>
    <script>
        const completeBtn = document.getElementById('complete-btn')
        const mainForm = document.getElementById('main-form')
        const title = document.getElementById('video-title')
        const description = document.getElementById('video-description')
        completeBtn.addEventListener("click",(e)=>{
            mainForm.submit();
        })
        mainForm.addEventListener('input', (e) => {
            if(title.value !== ''){
                completeBtn.disabled = false;
            } else {
                completeBtn.disabled = true;
            }
        })
    </script>
    <script>
        const thumbnail = document.getElementById('thumbnail-input');
        const editThumbnail = document.getElementById('edit-thumbnail'); 
        const thumbnailImg = document.getElementById('thumbnail');
        editThumbnail.addEventListener('click', (e) =>{
            e.preventDefault();
            thumbnail.click();
        })



thumbnail.onchange = function(event) {
    var target = event.target;

    if (!FileReader) {
        alert('FileReader не поддерживается — облом');
        return;
    }

    if (!target.files.length) {
        alert('Ничего не загружено');
        return;
    }

    var fileReader = new FileReader();
    fileReader.onload = function() {
        thumbnailImg.src = fileReader.result;
    }

    fileReader.readAsDataURL(target.files[0]);
}
    </script>
    <script>

    </script>
</body>

</html>