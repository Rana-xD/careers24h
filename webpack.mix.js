const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'js')
   .js('resources/assets/js/libraries.js','js')
   .babel('resources/assets/js/bootstrap-datepicker.js','public/js/bootstrap-datepicker.js')
   .babel('resources/assets/js/bootstrap.js','public/js/bootstrap.js')
   .babel('resources/assets/js/bootstrap.min.js','public/js/bootstrap.min.js')
   .babel('resources/assets/js/circle-progress.min.js','public/js/circle-progress.js')
   .babel('resources/assets/js/counter.js','public/js/counter.js')
   .babel('resources/assets/js/isotop.js','public/js/isotop.js')
   .babel('resources/assets/js/jquery.min.js','public/js/jquery.min.js')
   .babel('resources/assets/js/jquery.scrollbar.min.js','public/js/jquery.scrollbar.min.js')
   .babel('resources/assets/js/maps2.js','public/js/maps2.js')
   .babel('resources/assets/js/maps.js','public/js/maps.js')
   .babel('resources/assets/js/maps3.js','public/js/maps3.js')
   .babel('resources/assets/js/modernizr.js','public/js/modernizr.js')
   .babel('resources/assets/js/mouse.js','public/js/mouse.js')
   .babel('resources/assets/js/parallax.js','public/js/parallax.js')
   .babel('resources/assets/js/rslider.js','public/js/rslider.js')
   .babel('resources/assets/js/select-chosen.js','public/js/select-chosen.js')
   .babel('resources/assets/js/slick.min.js','public/js/slick.min.js')
   .babel('resources/assets/js/tag.js','public/js/tag.js')
   .babel('resources/assets/js/wow.min.js','public/js/wow.min.js')
   .babel('resources/assets/js/script.js','public/js/script.js')
   .sass('resources/assets/sass/app.scss','css')
   .styles('resources/assets/css/colors/colors.css','public/css/colors/colors.css')
   .styles('resources/assets/css/animate.min.css','public/css/animate.min.css')
   .styles('resources/assets/css/bootstrap-datepicker.css','public/css/bootstrap-datepicker.css')
   .styles('resources/assets/css/bootstrap-grid.css','public/css/bootstrap-grid.css')
   .styles('resources/assets/css/bootstrap.css','public/css/bootstrap.css')
   .styles('resources/assets/css/chosen.css','public/css/chosen.css')
   .styles('resources/assets/css/icons.css','public/css/icons.css')
   .styles('resources/assets/css/responsive.css','public/css/responsive.css')
   .styles('resources/assets/css/style.css','public/css/style.css')
   .babel([
      'resources/assets/js/main/utils.js',
      'resources/assets/js/main/main.js',
   ],'public/js/combined.js')
   .babel([
      'resources/assets/js/main/auth/company/company_broadcast.js',
      'resources/assets/js/main/auth/company/company.js'
   ],'public/js/auth_company.js')
   .babel([
      'resources/assets/js/main/auth/jobseeker/jobseeker_broadcast.js',
      'resources/assets/js/main/auth/jobseeker/jobseeker.js'
   ],'public/js/auth_jobseeker.js')
   .browserSync({
		proxy: 'http://localhost:8000/'
	});
   