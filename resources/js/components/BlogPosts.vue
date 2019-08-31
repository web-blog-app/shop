<template>
    <div class="blog-section">
        <div class="container">
            <h1 class="text-center">Актуальные статьи из нашего блога</h1>

            <p class="section-description">Здесь Вы сможете найти самую различную информацию, связанную с изделиями из дерева. Что нужно знать, как выбирать, ухаживать и восстанавливать различные изделия из дерева, столы, стулья, шкафы, кровати, кухни и многое другое.</p>

            <div class="blog-posts">
                <div v-for="post in posts" :key="post.id" class="blog-post">
                    <a :href="post.link">
                        <blog-image
                            :url="post._links['wp:attachment'][0].href">
                        </blog-image>
                    </a>
                    <a :href="post.link"><h2 class="blog-title">{{ post.title.rendered }}</h2></a>
                    <div class="blog-description">{{ stripTags(post.excerpt.rendered) }}</div>
                </div>
            </div>
        </div> <!-- end container -->
    </div> <!-- end blog-section -->
</template>

<script>
import BlogImage from './BlogImage'
import sanitizeHtml from 'sanitize-html'

export default {
    components: {
        BlogImage,
    },
    created() {
        axios.get('https://blog.rubanokshop.ru/wp-json/wp/v2/posts?per_page=3')
            .then(response => {
                this.posts = response.data
            }).catch((e) => console.error(e));
    },
    data() {
        return {
            posts: []
        }
    },
    methods: {
        stripTags(html) {
            return sanitizeHtml(html, {
                allowedTags: []
            }).substring(0, html.indexOf('&hellip;'))
        }
    }

}
</script>
