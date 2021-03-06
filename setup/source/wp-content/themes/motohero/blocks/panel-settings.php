<?php
$inwave_post_option = Inwave_Helper::getConfig();
$pnl = $inwave_post_option['panel-settings'];
?>
<div class="panel-tools">
	<div class="panel-content">
		<div class="row-setting layout-setting">
			<h3 class="title"><?php esc_html_e('LAYOUT','motohero');?></h3>
			<div class="setting">
				<button value="wide" class="button-command button-command-layout wide <?php if($pnl->layout=='wide') echo 'active' ?>"><?php esc_html_e('WIDE','motohero');?></button>
				<button value="boxed" class="button-command button-command-layout boxed <?php if($pnl->layout=='boxed') echo 'active' ?>"><?php esc_html_e('BOXED','motohero');?></button>
			</div>
		</div>
		<div class="row-setting color-setting sample-setting">
			<h3 class="title"><?php esc_html_e('SAMPLE COLOR','motohero');?></h3>
			<div class="setting">
				<button <?php if($pnl->mainColor=='#009fd7') echo 'class="active"' ?> value="#009fd7"></button>
				<button <?php if($pnl->mainColor=='#49a32b') echo 'class="active"' ?> value="#49a32b"></button>
				<button <?php if($pnl->mainColor=='#ec3642') echo 'class="active"' ?> value="#ec3642"></button>
				<button <?php if($pnl->mainColor=='#00c8d6') echo 'class="active"' ?> value="#00c8d6"></button>
				<button <?php if($pnl->mainColor=='#d31266') echo 'class="active"' ?> value="#d31266"></button>
				<button <?php if($pnl->mainColor=='#efc10a') echo 'class="active"' ?> value="#efc10a"></button>
			</div>
			<div class="description">
				<?php esc_html_e('Please read our documentation file to know how to change colors as you want','motohero');?>
			</div>
		</div>
		<div class="overlay-setting <?php if($pnl->layout=='wide') echo 'disabled' ?>">
		<div class="row-setting color-setting background-setting">
			<h3 class="title"><?php esc_html_e('BACKGROUND COLOR','motohero');?></h3>
			<div class="setting">
				<button <?php if($pnl->bgColor=='#87a8a5') echo 'class="active"' ?> value="#87a8a5"></button>
				<button <?php if($pnl->bgColor=='#38424a') echo 'class="active"' ?> value="#38424a"></button>
				<button <?php if($pnl->bgColor=='#e3e6e8') echo 'class="active"' ?> value="#e3e6e8"></button>
				<button <?php if($pnl->bgColor=='#242d39') echo 'class="active"' ?> value="#242d39"></button>
				<button <?php if($pnl->bgColor=='#000000') echo 'class="active"' ?> value="#000000"></button>
				<button <?php if($pnl->bgColor=='#222222') echo 'class="active"' ?> value="#222222"></button>
			</div>
		</div>
		<div class="row-setting color-setting background-setting">
			<h3 class="title"><?php esc_html_e('BACKGROUND TEXTURE','motohero');?></h3>
			<div class="setting">
				<button <?php if($pnl->bgColor==get_template_directory_uri().'/assets/images/texture/texture-1.png') echo 'class="active"' ?> value="<?php echo get_template_directory_uri()?>/assets/images/texture/texture-1.png"></button>
				<button <?php if($pnl->bgColor==get_template_directory_uri().'/assets/images/texture/texture-2.png') echo 'class="active"' ?> value="<?php echo get_template_directory_uri()?>/assets/images/texture/texture-2.png"></button>
				<button <?php if($pnl->bgColor==get_template_directory_uri().'/assets/images/texture/texture-3.png') echo 'class="active"' ?> value="<?php echo get_template_directory_uri()?>/assets/images/texture/texture-3.png"></button>
				<button <?php if($pnl->bgColor==get_template_directory_uri().'/assets/images/texture/texture-4.png') echo 'class="active"' ?> value="<?php echo get_template_directory_uri()?>/assets/images/texture/texture-4.png"></button>
				<button <?php if($pnl->bgColor==get_template_directory_uri().'/assets/images/texture/texture-5.png') echo 'class="active"' ?> value="<?php echo get_template_directory_uri()?>/assets/images/texture/texture-5.png"></button>
				<button <?php if($pnl->bgColor==get_template_directory_uri().'/assets/images/texture/texture-6.png') echo 'class="active"' ?> value="<?php echo get_template_directory_uri()?>/assets/images/texture/texture-6.png"></button>
			</div>
		</div>
		</div>
        <?php if(class_exists('RTLTester')): ?>
			<div class="row-setting rtl-setting">
				<div class="setting">
                    <a href="?d=ltr"><span data-value="ltr" class="button-command <?php if(!is_rtl()) echo 'active'; ?>"><?php esc_html_e('LEFT TO RIGHT','motohero');?></span></a>
					<a href="?d=rtl"><span data-value="rtl" class="button-command <?php if(is_rtl()) echo 'active'; ?>"><?php esc_html_e('RIGHT TO LEFT','motohero');?></span></a>

				</div>
			</div>
        <?php endif;?>
		<div class="reset-button">
			<button><?php esc_html_e('Reset','motohero');?></button>
		</div>
	</div>
	<button class="panel-button"><i class="theme-color glyphicon glyphicon-cog"></i></button>
</div>