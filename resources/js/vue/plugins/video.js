import Vue from 'vue'
import VueVideoPlayer  from 'vue-video-player'

// require videojs style
import 'video.js/dist/video-js.css';
// import 'vue-video-player/src/custom-theme.css';

import videojs from 'video.js';
window.videojs = videojs;

require('videojs-contrib-hls/dist/videojs-contrib-hls');
require('videojs-contrib-quality-levels/dist/videojs-contrib-quality-levels');
require('videojs-hls-quality-selector/dist/videojs-hls-quality-selector');

// videojs.options.hls.overrideNative = true;
// videojs.options.html5.nativeAudioTracks = false;
// videojs.options.html5.nativeTextTracks = false;


// videojs.Hls.xhr.beforeRequest = function (options) {
//    options.headers = {
//      "Access-Control-Allow-Origin": "https://7sety.s3.us-east-2.amazonaws.com",
//    };
//    return options;
//  };

Vue.use(VueVideoPlayer , /* {
  options: global default options,
  events: global videojs events
} */)