<template>
  <img :src="imageSrc" alt="Blog Image">
</template>

<script>
export default {
  props: ['url'],
  created() {
    axios.get(this.url)
      .then(response => {
          this.imageSrc = response.data[0].media_details.sizes.thumbnail.source_url
      })
  },
  data() {
    return {
      imageSrc: ''
    }
  }
}
</script>
