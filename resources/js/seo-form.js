export default class SeoForm {
    $slug;

    constructor() {
        this.$slug = $('#slug');
        if (this.$slug.length === 0) return false;

        $('[data-seo="slug"]').keyup(e => this.setSlug(e))
    }

    setSlug(e) {
        let value = $(e.currentTarget).val();
        this.$slug.val(slug(value))
    }
}
