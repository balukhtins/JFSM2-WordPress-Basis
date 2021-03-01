<?php
function view_contact_form_shortcode($atts){

    return
    '<div class="loaders loaders-none">
      <div class="loftloader-wrapper pl-wave">
        <div class="loader">
          <span></span>
        </div>
      </div>
    </div>
    <div class="container form-body">
        <div class="row justify-content-center form">
            <form id="form-guidance">
                <div class="form-group">
                    <label for="name">ФИО</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" pattern="[a-zA-Zа-яА-ЯёЁ ]{3,}" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                </div>
                <div class="form-group row align-items-end phone">
                    <div class="col-md-9 col-sm-12 mb-3 phone-left">
                        <label for="phone">Телефон</label>
                        <input type="text" class="form-control" id="phone" placeholder="Телефон в формате (XXX) XXX-XX-XX" pattern="\(\d{3}\) \d{3}-\d{2}-\d{2}" name="phone-1" maxlength="15" required>
                    </div>
                    <div class="col-md-3  mb-3 phone-right">
                        <button type="button" class="btn btn-plus">+</button>
                    </div>
                    <div class="col-md-9 phone-left">
                        <input type="text" class="form-control" id="phone-two" name="phone-2" disabled pattern="\(\d{3}\) \d{3}-\d{2}-\d{2}" maxlength="15">
                    </div>
                    <div class="col-md-3 phone-right">
                        <button type="button" class="btn btn-delite" id="btn-delite">Удалить</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="age">Возраст</label>
                    <input type="text" class="form-control" id="age" pattern="\d{2}" name="age" required>
                </div>
                <div class="photo">
                    <label for="file-button">Фотография</label>
                    <div class="photo-border">
                        <div id="photo-button">
                            <input type="file" class="form-control custom-file-input" id="file-button" name="photo" multiple="false" accept="image/*">
                            <img src="'. get_template_directory_uri(). '/assets/images/Photo.png" width="65" height="65" />
                        </div>
                    </div>
                </div>
               <div class="form-group">
                    <label for="exampleFormControlTextarea1">Резюме</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="resume" required></textarea>
                </div>
            </form>
        </div>
    </div>'
       ;
}