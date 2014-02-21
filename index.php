<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/headers.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tellraw Generator</title>
	<meta name="description" content="Tellraw Coder and Generator for Minecraft 1.7+"> 
	<?php $modernizer = true; $jscolor = true; include($_SERVER['DOCUMENT_ROOT'] . "/includes/head.php"); ?>
	<link rel="stylesheet" type="text/css" href="tellraw.css">
	<script src="minecraftLanguageStrings.js"></script>
	<script src="lang.js"></script>
	<script src="tellraw.js"></script>
	<meta charset="UTF-8">
</head>
<body class="minecraft">
	<?php if (!@$_GET['condensed']) { include($_SERVER['DOCUMENT_ROOT'] . "/includes/navbar.php"); ?>
	<div class="row">
		<div class="col-md-5 col-xs-12">
			<h4 class="language_area" id="page_header">
				Tellraw Generator for Minecraft 1.7+
			</h4>
		</div>
		<div class="col-md-1 col-xs-12 row-margin-top row-margin-bottom">
			<div class="btn-group btn-block">
				<button type="button" class="btn btn-block btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
					<span class="glyphicon glyphicon-share-alt"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li><a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fezekielelin.com%2Fminecraft%2Ftellraw%2F&amp;text=%2Ftellraw%20generator%20for%20minecraft&amp;tw_p=tweetbutton&amp;url=http%3A%2F%2Fezekielelin.com%2Fminecraft%2Ftellraw%2F&amp;via=ezekielfe">Tweet</a></li>
				</ul>
			</div>
		</div>
		<div class="col-md-4 col-xs-12 row-margin-top row-margin-bottom">
			<a href="http://www.minecraftforum.net/topic/1980545-" id="receive_updates" class="language_area btn btn-block btn-xs btn-success">Receive updates here ("Follow" the topic)</a>
		</div>
		<div class="col-md-2 col-xs-12 row-margin-top row-margin-bottom">
			<div class="btn-group btn-block">
				<button type="button" class="btn btn-block btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
					<span class="language_area" id="language_button_text">Language</span> <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu" id="language_keys">
				</ul>
			</div>
		</div>
	</div>
	<div class="alerts">
	</div>
	<br><br>
	<?php } else { ?>
	<div style="padding:20px">
		<?php } ?>
		<div class="forms">
			<div class="row">
				<div class="col-md-2 col-xs-12 row-margin-top row-margin-bottom">
					<span class="language_area" id="player_header"></span><br>
					<span class="language_area" id="player_description"></span>
				</div>
				<div class="col-md-10 col-xs-12 row-margin-top row-margin-bottom">
					<input value="@a" id="player" type="text" class="form-control">
				</div>
			</div>
			<div class="well">
				<div class="row">
					<div class="col-md-4">
						<h4 class="language_area" id="textsnippets_header"></h4>
					</div>
				</div>
				<div class="extraContainer">
					<div class="row">
						<div class="col-md-12">
							<h4 class="language_area" id="textsnippets_nosnippets"></h4>
						</div>
					</div>
				</div>
				<div class="row row-margin-top row-margin-bottom">
					<div class="col-md-4 col-md-offset-2">
						<button id="addExtraButton" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addExtraModal">
							<span class="language_area" id="textsnippets_addsnippet"></span> <span class="glyphicon glyphicon-plus-sign"></span>
						</button>
					</div>
					<div class="col-md-4">
						<button class="btn btn-danger btn-block" id="deleteAllBtn" onclick="deleteAll()">
							<span class="language_area" id="textsnippets_deleteall"></span> <span class="glyphicon glyphicon-remove-sign"></span>
						</button>
					</div>
				</div>
			</div>
			<div style="display:none;" id="addExtraModalData">
				<div class="row" id="modal_banners">
				</div>
				<div class="row row-margin-top row-margin-bottom">
					<div class="btn-group col-md-10">
						<button type="button" id="fmtExtraRaw" tellrawType="raw" class="fmtExtra language_area active btn btn-default">Raw</button>
						<button type="button" id="fmtExtraTrn" tellrawType="trn" class="fmtExtra language_area btn btn-default">Translated</button>
						<button type="button" id="fmtExtraObj" tellrawType="obj" class="fmtExtra language_area btn btn-default">Objective</button>
					</div>
				</div>
				<div class="row row-margin-top row-margin-bottom" id="text_extra_container_container">
					<div class="col-md-7" id="obj_extra_container">
						<div>
							<input placeholder="Player" id="obj_player" type="text" class="form-control">
						</div>
						<div class="row-margin-top">
							<input placeholder="Objective" id="obj_score" type="text" class="form-control">
						</div>
					</div>
					<div class="col-md-7" id="text_extra_container">
						<input placeholder="Text" id="text_extra" type="text" class="form-control">
					</div>
					<div class="col-md-7" id="translate_selector_container">
						<select class="form-control" id="translate_selector"></select>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-10">
								<select class="form-control" onchange="refreshOutput()" id="color_extra">
									<option class="language_area" id="color_black" value="black">color_black</option>
									<option class="language_area" id="color_dark_blue" value="dark_blue">color_dark_blue</option>
									<option class="language_area" id="color_dark_green" value="dark_green">color_dark_green</option>
									<option class="language_area" id="color_dark_aqua" value="dark_aqua">color_dark_aqua</option>
									<option class="language_area" id="color_dark_red" value="dark_red">color_dark_red</option>
									<option class="language_area" id="color_dark_purple" value="dark_purple">color_dark_purple</option>
									<option class="language_area" id="color_gold" value="gold">color_gold</option>
									<option class="language_area" id="color_gray" value="gray">color_gray</option>
									<option class="language_area" id="color_dark_gray" value="dark_gray">color_dark_gray</option>
									<option class="language_area" id="color_blue" value="blue">color_blue</option>
									<option class="language_area" id="color_green" value="green">color_green</option>
									<option class="language_area" id="color_aqua" value="aqua">color_aqua</option>
									<option class="language_area" id="color_red" value="red">color_red</option>
									<option class="language_area" id="color_light_purple" value="light_purple">color_light_purple</option>
									<option class="language_area" id="color_yellow" value="yellow">color_yellow</option>
									<option class="language_area" id="color_white" value="white" selected="true">color_white</option>
								</select>
							</div>
							<div class="col-md-2">
								<div id="colorPreview" class="colorPreview">
									<div id="colorPreviewColor" class="colorPreviewColor">
									</div>
								</div>
							</div>
						</div>
						<label><input type="checkbox" id="bold_text_extra"> <span class="language_area" id="textsnippets_bold"></span></label>
						<label><input type="checkbox" id="italic_text_extra"> <span class="language_area" id="textsnippets_italic"></span></label>
						<label><input type="checkbox" id="underlined_text_extra"> <span class="language_area" id="textsnippets_underlined"></span></label>
						<label><input type="checkbox" id="strikethrough_text_extra"> <span class="language_area" id="textsnippets_strikethrough"></span></label>
						<label><input type="checkbox" id="obfuscated_text_extra"> <span class="language_area" id="textsnippets_obfuscated"></span></label>
					</div>
				</div>
				<div class="extraTranslationParameterRow row row-margin-top row-margin-bottom" id="parameter0row">
					<div class="col-md-4 language_area" id="parameter0">

					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" class="extraTranslationParameter" id="extraTranslationParameter0">
					</div>
				</div>
				<div class="extraTranslationParameterRow row row-margin-top row-margin-bottom" id="parameter1row">
					<div class="col-md-4 language_area" id="parameter1">

					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" class="extraTranslationParameter" id="extraTranslationParameter1">
					</div>
				</div>
				<div class="extraTranslationParameterRow row row-margin-top row-margin-bottom" id="parameter2row">
					<div class="col-md-4 language_area" id="parameter2">

					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" class="extraTranslationParameter" id="extraTranslationParameter2">
					</div>
				</div>
				<div class="extraTranslationParameterRow row row-margin-top row-margin-bottom" id="parameter3row">
					<div class="col-md-4 language_area" id="parameter3">

					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" class="extraTranslationParameter" id="extraTranslationParameter3">
					</div>
				</div>
				<div class="extraTranslationParameterRow row row-margin-top row-margin-bottom" id="parameter4row">
					<div class="col-md-4 language_area" id="parameter4">

					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" class="extraTranslationParameter" id="extraTranslationParameter4">
					</div>
				</div>
				<div class="extraTranslationParameterRow row row-margin-top row-margin-bottom" id="parameter5row">
					<div class="col-md-4 language_area" id="parameter5">

					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" class="extraTranslationParameter" id="extraTranslationParameter5">
					</div>
				</div>
				<div class="extraTranslationParameterRow row row-margin-top row-margin-bottom" id="parameter6row">
					<div class="col-md-4 language_area" id="parameter6">

					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" class="extraTranslationParameter" id="extraTranslationParameter6">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4 class="language_area" id="textsnippets_clickevent_header"></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<select onchange="refreshOutput()" class="form-control" id="clickEvent">
							<option class="language_area" id="clickevent_none" value="none" selected="true"></option>
							<option class="language_area" id="clickevent_runcommand" value="run_command"></option>
							<option class="language_area" id="clickevent_suggestcommand" value="suggest_command"></option>
							<option class="language_area" id="clickevent_openurl" value="open_url"></option>
						</select>
					</div>
					<div class="col-md-8">
						<input id="clickEventText" type="text" class="form-control">
					</div>
				</div>
				<div class="row row-margin-top row-margin-bottom">
					<div class="col-md-4 col-md-offset-4 tooltipObject" id="click_selector_container" data-toggle="tooltip" data-placement="top" title="This text will be inserted into the textbox">
						<select class="form-control" onchange="refreshOutput()" id="click_selector" disabled></select>
					</div>
					<div class="col-md-4">
						<button id="insertClick" onclick="$('#clickEventText').val(getSelected('click_selector'));" class="btn btn-info btn-block" disabled><span class="language_area" id="textsnippets_insert">Insert</span> <span class="glyphicon glyphicon-plus-sign"></span></button>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4 class="language_area" id="textsnippets_hoverevent_header"></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<select onchange="refreshOutput()" class="form-control" id="hoverEvent">
							<option class="language_area" id="hoverevent_none" value="none" selected="true"></option>
							<option class="language_area" id="hoverevent_show_text" value="show_text"></option>
							<option class="language_area" id="hoverevent_show_item" value="show_item"></option>
							<option class="language_area" id="hoverevent_show_entity" value="show_entity"></option>
							<option class="language_area" id="hoverevent_show_achievement" value="show_achievement"></option>
						</select>
					</div>
					<div class="hovertext_default">
						<div class="col-md-8">
							<input id="hoverEventText" type="text" class="form-control">
						</div>
					</div>
					<div class="hovertext_entity">
						<div class="col-md-2 language_area" id="hoverevent_entity_name">
							_name
						</div>
						<div class="col-md-6">
							<input id="hoverEventEntityName" type="text" class="form-control">
						</div>
					</div>
				</div>
				<div class="hovertext_entity row row-margin-top row-margin-bottom">
					<div class="col-md-2 col-md-offset-4 language_area" id="hoverevent_entity_id">
						_id
					</div>
					<div class="col-md-6">
						<input id="hoverEventEntityID" type="text" class="form-control">
					</div>
				</div>
				<div class="hovertext_entity row row-margin-top row-margin-bottom">
					<div class="col-md-2 col-md-offset-4 language_area" id="hoverevent_entity_type">
						_type
					</div>
					<div class="col-md-6">
						<input id="hoverEventEntityType" type="text" class="form-control">
					</div>
				</div>

				<div class="row row-margin-top row-margin-bottom hovertext_default">
					<div class="col-md-4 col-md-offset-4 tooltipObject" id="hover_selector_container" data-toggle="tooltip" data-placement="top" title="This text will be inserted into the textbox">
						<select class="form-control" id="hover_selector" disabled></select>
					</div>
					<div class="col-md-4">
						<button id="insertHover" onclick="document.getElementById('hoverEventText').value = getSelected('hover_selector');" class="btn btn-info btn-block" disabled><span class="language_area" id="textsnippets_insert">Insert</span> <span class="glyphicon glyphicon-plus-sign"></span></button>
					</div>
				</div>
				<div class="row" style="height:39px">
				</div>
				<div class="row row-margin-top row-margin-bottom">
					<div class="col-md-4">
						<h4 class="language_area" id="textsnippets_insertion_header"></h4>
					</div>
					<div class="col-md-8">
						<input id="insertion_text" type="text" class="form-control">
					</div>
				</div>
			</div>
			<div class="row row-margin-top row-margin-bottom">
				<div class="col-md-2" id="output_label">
					<span class="language_area" id="command"></span> <span onclick="refreshOutput()" class="glyphicon glyphicon-refresh"></span><br>
					<span class="language_area" id="commandblock"></span>
				</div>
				<div class="col-md-10">
					<textarea onkeyup="refreshOutput()" id="outputtextfield" class="form-control"></textarea>
				</div>
			</div>
			<div class="row row-margin-top row-margin-bottom">
				<div class="col-md-10 col-md-offset-2">
					<pre id="nicelookingoutput">

					</pre>
				</div>
			</div>
			<div class="row row-margin-top row-margin-bottom">
				<div class="col-md-2">
					<span class="language_area" id="settings"></span>
				</div>
				<div class="col-md-4 col-xs-12">
					<button class="btn btn-block btn-default language_area" id="import"></button>
				</div>
				<div class="col-md-4 col-xs-12">
					<div class="col-md-8 col-xs-12">
						<span class="language_area" id="previewcolorlabel"></span>
					</div>
					<div class="col-md-4 col-xs-12">
						<input onchange="refreshOutput()" id="previewcolor" class="color form-control" value="F5774A">
					</div>
				</div>
				<input id="previewFontSize" type="hidden" onkeyup="refreshOutput()" value="13" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-xs-12 row-margin-top row-margin-bottom language_area" id="output_header">
			</div>
			<div class="col-xs-12 row-margin-top row-margin-bottom col-md-10">
				<pre id="jsonPreview" class="language_area"></pre>
			</div>
		</div>
		<br><br>
		<span style="color:grey;font-size:10px" id="lang_credit" class="language_area"></span>
		<br>
		<?php include($_SERVER['DOCUMENT_ROOT'] . "/includes/foot.php"); ?>
	</body>
	</html>