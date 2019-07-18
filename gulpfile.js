/**
 * Frontend 
 */

// const gulp = require('gulp');
// var rename = require('gulp-rename');
// const uglify = require('gulp-uglify');
 
// var sourcemaps = require('gulp-sourcemaps');
// var browserify = require('browserify');
// var babelify = require('babelify');
// var source = require('vinyl-source-stream');
// var buffer = require('vinyl-buffer');

// var jsFOLDER = 'x_moikzz_assets/back/js/modules/';
// var jsSRC = 'app.js';
// var jsDIST = 'x_moikzz_assets/back/dist/js'; 
// var jsWatch = 'x_moikzz_assets/back/js/**/*.js';
// var jsFILES = [jsSRC];

// function js(done){
 
//     jsFILES.map(function(entry){
//         return browserify({
//             entries: [jsFOLDER + entry]
//         })
//         .transform( babelify, { presets: ['env']} )
//         .bundle()
//         .pipe( source( entry ))
//         .pipe( rename({ suffix: '.min' }) )
//         .pipe( buffer() )
//         .pipe( sourcemaps.init({ loadMaps: true }) )
//         .pipe( uglify() )
//         .pipe( sourcemaps.write( './' ) )
//         .pipe( gulp.dest( jsDIST ))
//     });
//     done();
// }

// function watch_files(){ 
//     gulp.watch(jsWatch, js);
//     gulp.src(jsFOLDER + 'app.js');
// }

// gulp.task("scripts", js); 
// gulp.task("default",  gulp.parallel( 'scripts' ));
// gulp.task("watch", watch_files);

var gulp = require('gulp');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var browserify = require('browserify');
var babelify = require('babelify');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');


/* Frontend */ 
var frontStyleSRC = './x_moikzz_assets/front/scss/fleet.scss';
var frontStyleDIST = './x_moikzz_assets/front/css/'; 
var frontStyleWatch = './x_moikzz_assets/front/scss/**/*.scss';

// var jsFOLDER = './lib/js/';
// var jsSRC = 'otc.js';
// var jsDIST = './assets/js/'; 
// var jsWatch = './lib/js/**/*.js';
// var jsFILES = [jsSRC];

function css(done){
    gulp.src( frontStyleSRC )
        .pipe( sourcemaps.init() )
        .pipe( sass({   
            errorLogToConsole: true,
            outputStyle: 'compressed'
        }) )
        .on( 'error', console.error.bind(console) )
        .pipe( autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }) )
        .pipe( rename( { suffix: '.min' } ))
        .pipe( sourcemaps.write( './' ))
        .pipe( gulp.dest( frontStyleDIST ) );
    done();
}

// function js(done){
//     // Browserify
//     // Transform babelify
//     // Bundle
//     // Source
//     // Rename .min
//     // Buffer
//     // Sourcemap
//     // Uglify
//     // Write Sourcemap
//     // Dist
//     jsFILES.map(function(entry){
//         return browserify({
//             entries: [jsFOLDER + entry]
//         })
//         .transform( babelify, { presets: ['env']} )
//         .bundle()
//         .pipe( source( entry ))
//         .pipe( rename({ suffix: '.min' }) )
//         .pipe( buffer() )
//         .pipe( sourcemaps.init({ loadMaps: true }) )
//         .pipe( uglify() )
//         .pipe( sourcemaps.write( './' ) )
//         .pipe( gulp.dest( jsDIST ))
//     });
//     done();
// }

function watch_files(){
    gulp.watch(frontStyleWatch, css);
    // gulp.watch(jsWatch, js);
    // gulp.src(jsFOLDER + 'otc.js');
}

gulp.task("css", css);
// gulp.task("js", js);
// gulp.task("default", gulp.parallel('css', 'js'));
gulp.task("default", gulp.parallel('css'));
gulp.task("watch", watch_files);