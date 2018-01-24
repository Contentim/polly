<?php

echo "<h1><span>Подпункт 1:</span> Отладочная страница для будущего плагина слайдера - msp-liteslider-submenu.php</h1>";

echo '
<div class="msp-slider-info-wrap">
    <div class="msp-form msp-form-inline clearfix" id="msp-slider-info">
        <div class="msp-form-control-group">
            <label class="msp-required">Slider Name</label>
            <input type="text" class="msp-slider-name" placeholder="Slider Name" value="Newnew Slider" onkeypress="return avsIsNotSpecialChar(event);">
        </div>
        <div class="msp-form-control-group">
            <label class="msp-required">Alias</label>
            <input type="text" class="msp-slider-alias msp-pro-version" readonly="readonly" placeholder="Alias" value="newnew_slider" onkeypress="return avsIsNotSpecialChar(event);">
        </div>
        <div class="msp-form-control-group">
            <label>Shortcode</label>
            <input type="text" class="msp-slider-shortcode" readonly="readonly" onclick="this.select();" value="[avartanslider alias=\'newnew_slider\']">
        </div>
        <div class="msp-form-control-group">
            <label>PHP Function</label>
            <input type="text" class="msp-slider-php-function" readonly="readonly" onclick="this.select();" value="if(function_exists(\'avartanslider\')) avartanslider(\'newnew_slider\');">
        </div>
    </div>
</div>
';

echo '
<div class="msp-panel">
<div class="msp-panel-header clearfix">
    <h4>Slider Settings</h4>
    <div class="msp-action-button">
        <button type="button" class="msp-btn msp-btn-green msp-save-settings" data-id=""><i class="fa fa-save"></i> <span>Save Settings</span></button>
        <button type="button" class="msp-btn msp-btn-orange msp-preview-slider msp-pro-version"><i class="fa fa-search"></i> <span>Preview</span></button>
        <button id="delete_msp_slider_" type="button" class="msp-btn msp-btn-red msp-delete-slider"><i class="fa fa-trash"></i> <span>Delete Slider</span></button>
        <button type="button" onclick="location.href=\'?page=msp_liteslider\';" class="msp-btn msp-btn-blue" title="All Slider"><i class="fa fa-list"></i> <span>All Slider</span></button>
    </div>
</div>

<div class="msp-panel-body">
<div class="wrap_vertical_tab">
<div id="tabs-msp-slider">
  <ul>
    <li><a href="#tabs-1">Background</a></li>
    <li><a href="#tabs-2">Animation</a></li>
    <li><a href="#tabs-3">Action</a></li>
    <li><a href="#tabs-4">Attributes</a></li>
  </ul>
  <div id="tabs-1">
    <h2>Background</h2>
    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
  </div>
  <div id="tabs-2">
    <h2>Animation</h2>
    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
  </div>
  <div id="tabs-3">
    <h2>Action</h2>
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>
  <div id="tabs-4">
    <h2>Attributes</h2>
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>
</div>
</div>
</div>
</div>
    ';
