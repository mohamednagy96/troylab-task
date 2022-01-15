<template>
<div>
  <video-player
    class="vjs-fluid"
    ref="videoPlayer"
    :options="playerOptions"
    :playsinline="true"
    @ready="playerReadied"
  >
  </video-player>
</div>

</template>

<script>
import 'videojs-contrib-quality-levels';
import videojsqualityselector from 'videojs-hls-quality-selector';
export default {
   props: ['video'],
  data() {
    return {
      playerOptions: {
        // videojs options
      //   height: "350",
        muted: true,
        language: "en",
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [
          {
            src: this.video,
            withCredentials: true,
          },
        ],
        //  poster: "/static/images/author.jpg",
      },
    };
  },
  mounted() {
      console.log(this.video);
  },
  computed: {
    player() {
      return this.$refs.videoPlayer.player;
    },
  },
  methods: {
    playerReadied(player) {
      player.hlsQualitySelector = videojsqualityselector;
      player.hlsQualitySelector({
         displayCurrentQuality: true,
      });
      player.fluid(true)

    },
  },
};
</script>

<style>
.vjs-fluid{
       padding-top : 0
}
</style>
