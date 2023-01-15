<script src="https://cdn.tiny.cloud/1/krkbhjvr0o3y8nlvlyvnthisihpfxmn5xytnqtkh88q464a3/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>


<form class="main__new-post" method="get">
    <label class="main__new-post-add">
        <input type="text" placeholder="Přidej příspěvek" class="main__new-post-input"/>
        <button class="main__new-post-button button" type="button"><i class="fa-solid fa-plus"></i></button>
    </label>
    <div class="main__new-post-textarea hidden">
        <h2 class="new-post-title">Nový příspěvek</h2>
        <label>
            <textarea name="content"></textarea>
        </label>
        <div class="main__new-post-controls">
            <label>
                <input type="text" name="title" placeholder="Název příspěvku" class="main__new-post-title"
                       maxlength="50" required>
            </label>
            <div class="main__new-post-footer">
                <label>
                    <select name="topic">
                        <?php
                        if (!isset($topic)) {
                            require_once 'start.config.php';
                        }

                        $topics = $topic->getAllTopics();

                        foreach ($topics as $tempTopic) { ?>
                            <option value="<?= $tempTopic->id ?>"> <?= $tempTopic->title ?> </option>
                            <?php
                        }
                        ?>
                    </select>
                </label>
                <div class="buttons">
                    <button type="button" class="button button--close"><i class="fa-regular fa-circle-xmark"></i></button>
                    <button type="submit" class="button" name="submit"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    let addPost = document.getElementsByClassName('main__new-post-textarea')[0]
    let newPost = document.getElementsByClassName('main__new-post')[0]
    let newPostAdd = document.getElementsByClassName('main__new-post-add')[0]
    let closeBtn = document.getElementsByClassName('button--close')[0]
    let newPostTitleInput = document.getElementsByClassName('main__new-post-title')[0]
    let newPostTitle = document.getElementsByClassName('new-post-title')[0]

    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink codesample emoticons link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar: 'undo redo | bold italic underline strikethrough | link | spellcheckdialog typography | numlist bullist indent outdent | emoticons',
        resize: false,
        branding: false,
        contextmenu: 'link bold italic underline',
        menubar: false,
    });

    newPostAdd.addEventListener('click', () => {
        addPost.classList.remove('hidden')
        newPostAdd.classList.add('hidden')
    })

    closeBtn.addEventListener('click', () => {
        addPost.classList.add('hidden')
        newPostAdd.classList.remove('hidden')
    })

    newPostTitleInput.addEventListener('input', () => {
        if (newPostTitleInput.textLength < 1) {
            newPostTitle.innerHTML = 'Nový příspěvek'
            return
        }

        newPostTitle.innerHTML = newPostTitleInput.value
    })


</script>