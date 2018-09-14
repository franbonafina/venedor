
jQuery(function($) {

    var form = jQuery('<div id="feature_box_slider-form"><table id="feature_box_slider-table" class="form-table">\
			<tr>\
				<th><label for="feature_box_slider-title">Title</label></th>\
				<td><input type="text" name="title" id="feature_box_slider-title" value="" /></td>\
			</tr>\
            <tr>\
				<th><label for="feature_box_slider-animation_type">Animation Type</label></th>\
                <td><select name="animation_type" id="feature_box_slider-animation_type">\
                ' + venedor_shortcode_animation_type() + '\
				</select></td>\
            </tr>\
			<tr>\
				<th><label for="feature_box_slider-animation_duration">Animation Duration</label></th>\
				<td><input type="text" name="animation_duration" id="feature_box_slider-animation_duration" value="1" />\
				<br/><small>numerical value (unit: seconds)</small></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box_slider-animation_delay">Animation Delay</label></th>\
				<td><input type="text" name="animation_delay" id="feature_box_slider-animation_delay" value="0" />\
				<br/><small>numerical value (unit: seconds)</small></td>\
			</tr>\
            <tr>\
				<th><label for="feature_box_slider-class">Custom Class</label></th>\
				<td><input type="text" name="class" id="feature_box_slider-class" value="" />\
				<br/><small>can add margin classes like "m-t-xxl m-b-xxl"</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="feature_box_slider-submit" class="button-primary" value="Insert Shortcode" name="submit" />\
		</p>\
		</div>');

    var table = form.find('table');
    form.appendTo('body').hide();

    form.find('#feature_box_slider-submit').click(function(){

        var options = {
            'title'              : '',
            'animation_type'     : '',
            'animation_duration' : '1',
            'animation_delay'    : '0',
            'class'              : ''
        };

        var shortcode = '[feature_box_slider';

        for( var index in options) {
            var value = table.find('#feature_box_slider-' + index).val();

            if ( value !== options[index] && (typeof value !== 'undefined'))
                shortcode += ' ' + index + '="' + value + '"';
        }

        shortcode += ']Insert Feature Box Shortcodes[/feature_box_slider]';

        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

        tb_remove();
    });
});


jQuery(function($) {

    var form = jQuery('<div id="feature_box-form"><table id="feature_box-table" class="form-table">\
			<tr>\
				<th colspan="2"><strong>Configure with image or icon options.</strong></th>\
			</tr>\
			<tr>\
				<th><label for="feature_box-size">Image or Icon Wrapper Size</label></th>\
				<td><input type="text" name="size" id="feature_box-size" value="124" />\
				<br/><small>numerical value</small></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box-image">Image URL</label></th>\
				<td><input type="text" name="image" id="feature_box-image" value="" />\
				<br/><small>ex: //example.com/image.png</small></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box-image_bordercolor">Image Border Color</label></th>\
				<td><input type="text" name="image_bordercolor" id="feature_box-image_bordercolor" value="" /></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box-icon">FontAwesome Icon Name</label></th>\
				<td><select name="icon" id="feature_box-icon">\
                ' + venedor_shortcode_fontawesome_icon() + '\
				</select></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box-icon_bg">Icon Background Color</label></th>\
				<td><input type="text" name="icon_bg" id="feature_box-icon_bg" value="" /></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box-icon_color">Icon Color</label></th>\
				<td><input type="text" name="icon_color" id="feature_box-icon_color" value="" /></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box-icon_bordercolor">Icon Border Color</label></th>\
				<td><input type="text" name="icon_bordercolor" id="feature_box-icon_bordercolor" value="" /></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box-title">Title</label></th>\
				<td><input type="text" name="title" id="feature_box-title" value="" /></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box-link">Link</label></th>\
				<td><input type="text" name="link" id="feature_box-link" value="" /></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box-align">Align</label></th>\
				<td><select name="align" id="feature_box-align">\
                ' + venedor_shortcode_align_center() + '\
				</select></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box-bg_color">Background Color</label></th>\
				<td><input type="text" name="bg_color" id="feature_box-bg_color" value="" /></td>\
			</tr>\
            <tr>\
				<th><label for="feature_box-border">Border</label></th>\
				<td><select name="border" id="feature_box-border">\
                ' + venedor_shortcode_boolean_true() + '\
				</select></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box-show_bg">Show Background</label></th>\
				<td><select name="show_bg" id="feature_box-show_bg">\
                ' + venedor_shortcode_boolean_false() + '\
				</select></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box-animation_type">Animation Type</label></th>\
                <td><select name="animation_type" id="feature_box-animation_type">\
                ' + venedor_shortcode_animation_type() + '\
				</select></td>\
            </tr>\
			<tr>\
				<th><label for="feature_box-animation_duration">Animation Duration</label></th>\
				<td><input type="text" name="animation_duration" id="feature_box-animation_duration" value="1" />\
				<br/><small>numerical value (unit: seconds)</small></td>\
			</tr>\
			<tr>\
				<th><label for="feature_box-animation_delay">Animation Delay</label></th>\
				<td><input type="text" name="animation_delay" id="feature_box-animation_delay" value="0" />\
				<br/><small>numerical value (unit: seconds)</small></td>\
			</tr>\
            <tr>\
				<th><label for="feature_box-class">Custom Class</label></th>\
				<td><input type="text" name="class" id="feature_box-class" value="" />\
				<br/><small>can add margin classes like "m-t-xxl m-b-xxl"</small></td>\
			</tr>\
		</table>\
		<p class="submit">\
			<input type="button" id="feature_box-submit" class="button-primary" value="Insert Shortcode" name="submit" />\
		</p>\
		</div>');

    var table = form.find('table');
    form.appendTo('body').hide();

    form.find('#feature_box-submit').click(function(){

        var options = {
            'size'               : '124',
            'image'              : '',
            'image_bordercolor'  : '',
            'icon'               : '',
            'icon_bg'            : '',
            'icon_color'         : '',
            'icon_bordercolor'   : '',
            'title'              : '',
            'link'               : '',
            'align'              : 'center',
            'bg_color'           : '',
            'border'             : 'true',
            'show_bg'            : 'false',
            'animation_type'     : '',
            'animation_duration' : '1',
            'animation_delay'    : '0',
            'class'              : ''
        };

        var shortcode = '[feature_box';

        for( var index in options) {
            var value = table.find('#feature_box-' + index).val();

            if ( value !== options[index] && (typeof value !== 'undefined'))
                shortcode += ' ' + index + '="' + value + '"';
        }

        shortcode += ']Insert Content[/feature_box]';

        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

        tb_remove();
    });
});