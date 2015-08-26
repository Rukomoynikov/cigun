var gulp = require('gulp'),
	stylus = require('gulp-stylus'),
	jade = require('gulp-jade'),
	postcss = require('gulp-postcss'),
	babel = require('gulp-babel'),
	autoprefixer = require('gulp-autoprefixer');

gulp.task('css', function(){
	var processors = [
		autoprefixer({browsers: ['last 1 version']}),
	]
	return gulp.src('./assets/css/*.styl')
		.pipe(stylus())
		.pipe(postcss(processors))
		.pipe(gulp.dest('./assets/css/'))
});

gulp.task('jade', function(){
	return gulp.src('./*.jade')
		.pipe(jade({
			pretty: true
		}))
		.pipe(gulp.dest('./'))
})

// gulp.task('es6to5', function(){
// 	return gulp.src('./assets/js/*.js')
// 		.pipe(babel())
// 		.pipe(gulp.dest('./assets/js'))
// })

gulp.task('watch', function(){
	gulp.watch('./*.jade', ['jade']);
	gulp.watch('./assets/css/*.styl', ['css']);
	// gulp.watch('./*.js', ['es6to5']);
})

gulp.task('default', ['watch', 'css', 'jade'])