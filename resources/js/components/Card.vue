<template>
  <Card v-if="!size" class="ncl_flex ncl_flex-col ncl_items-center ncl_justify-center">
    <div class="ncl_px-3 ncl_py-3">
      <h1 class="ncl_text-center ncl_text-3xl ncl_text-gray-500 ncl_font-light">
        Component not available
      </h1>
    </div>
  </Card>
  <Card v-else class="ncl_flex ncl_items-center ncl_justify-center">
    <div class="ncl_flex-1 ncl_pl-8 ncl_pr-3">
      <h1 class="ncl_text-3xl ncl_text-80 ncl_font-light">
        Log
      </h1>
      <div v-if="size" class="ncl_mt-3">
        Log Size: <code>{{ size }}</code>
      </div>
    </div>
    <div v-if="size" class="ncl_flex-2 ncl_pr-8 ncl_pl-3 ncl_text-right">
      <div class="ncl_flex ncl_flex-col">
        <button @click="flushLog" v-bind:class="getClassList()">
          <span v-if="isLoadingData" v-html="loaderIcon"></span>
          Flush
        </button>
      </div>
    </div>
  </Card>
</template>

<script>
import { ROUTE } from '../constants';

export default {
  props: ['card'],
  data() {
    return {
      isLoadingData: false,
      size: null
    }
  },
  mounted() {
    this.init();
  },
  computed: {
    loaderIcon() {
      return '<svg viewBox="0 0 128 128" class="ncl_w-4 ncl_h-4 ncl_mr-2"><g><path d="M78.75 16.18V1.56a64.1 64.1 0 0 1 47.7 47.7H111.8a49.98 49.98 0 0 0-33.07-33.08zM16.43 49.25H1.8a64.1 64.1 0 0 1 47.7-47.7V16.2a49.98 49.98 0 0 0-33.07 33.07zm33.07 62.32v14.62A64.1 64.1 0 0 1 1.8 78.5h14.63a49.98 49.98 0 0 0 33.07 33.07zm62.32-33.07h14.62a64.1 64.1 0 0 1-47.7 47.7v-14.63a49.98 49.98 0 0 0 33.08-33.07z" fill="#eef3fb" fill-opacity="1"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="-90 64 64" dur="600ms" repeatCount="indefinite"></animateTransform></g></svg>';
    }
  },
  methods: {
    init() {
      this.size = this.card.size;
    },
    getClassList() {
      let sClassList = 'ncl_text-white ncl_text-sm ncl_px-4 ncl_py-2 ncl_font-medium ncl_rounded-md ncl_flex ncl_items-center';
      if (!this.isLoadingData) {
        sClassList += ' ncl_bg-red-500 hover:ncl_bg-red-400';
      } else {
        sClassList += ' ncl_bg-red-400 ncl_cursor-default';
      }

      return sClassList;
    },
    async flushLog() {
      if (this.isLoadingData) {
        return
      }

      this.isLoadingData = true;

      await Nova.request().delete(ROUTE.API_LOG_DELETE)
        .then((response) => {
          const { data } = response.data;
          if (!data) {
            return;
          }

          this.size = data.size;
        });

      this.isLoadingData = false;
    }
  }
}
</script>
