<?php

    echo "<h1><span>Подпункт 2:</span> Отладочная страница для будущего плагина слайдера</h1>";

    echo "
        <table>
            <tr>
                <td>
                    <input type='submit' name='add_slider' value='Создать новый слайдер'/>
                </td>
            </tr>
        </table>
    ";

    echo "
    <table class=\"wp-list-table widefat fixed striped posts\">
		<thead>
			<tr>
				<th class=\"manage-column column-title column-primary sortable title\" id=\"title\" scope=\"col\">Заголовок</th>
				<th class=\"manage-column column-shortcode sortable shortcode\" id=\"date\" scope=\"col\">Шорткод</th>
				<th class=\"manage-column column-id\" id=\"post_id\" scope=\"col\">ID</th>
				<th class=\"manage-column column-delete\" id=\"post_id\" scope=\"col\"></th>
			</tr>
		</thead>
		<tbody id=\"the-list\">
			<tr class=\"iedit author-other level-0 post-4820 type-sleek-slider status-publish has-post-thumbnail hentry category_slider-slider_foto\" id=\"post-4820\">
				<td class=\"mels-slider-title\" ><a href=\"javascript:;\">Слайдер на главной</a></td>
				<td class=\"mels-slider-shortcode\">[slider-4820]</td>
				<td class=\"mels-slider-id\">4820</td>
				<td class=\"mels-slider-delete-current-item\"><a href='javascript:;'>Удалить</a></td>
			</tr>
			<tr class=\"iedit author-other level-0 post-4820 type-sleek-slider status-publish has-post-thumbnail hentry category_slider-slider_foto\" id=\"post-4820\">
				<td class=\"mels-slider-title\" ><a href=\"javascript:;\">Слайдер на главной</a></td>
				<td class=\"mels-slider-shortcode\">[slider-4820]</td>
				<td class=\"mels-slider-id\">4820</td>
				<td class=\"mels-slider-delete-current-item\"><a href='javascript:;'>Удалить</a></td>
			</tr>
			<tr class=\"iedit author-other level-0 post-4820 type-sleek-slider status-publish has-post-thumbnail hentry category_slider-slider_foto\" id=\"post-4820\">
				<td class=\"mels-slider-title\" ><a href=\"javascript:;\">Слайдер на главной</a></td>
				<td class=\"mels-slider-shortcode\">[slider-4820]</td>
				<td class=\"mels-slider-id\">4820</td>
				<td class=\"mels-slider-delete-current-item\"><a href='javascript:;'>Удалить</a></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th class=\"manage-column column-title column-primary sortable title\" id=\"title\" scope=\"col\">Заголовок</th>
				<th class=\"manage-column column-shortcode sortable shortcode\" id=\"date\" scope=\"col\">Шорткод</th>
				<th class=\"manage-column column-id\" id=\"post_id\" scope=\"col\">ID</th>
				<th class=\"manage-column column-delete\" id=\"post_id\" scope=\"col\"></th>
			</tr>
		</tfoot>
	</table>
    ";
