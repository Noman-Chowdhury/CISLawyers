const mix = require('laravel-mix')
const path = require('path')

// require('laravel-mix-bundle-analyzer')
// if (mix.isWatching()) {
//     mix.bundleAnalyzer()
// }
// admin & seller dashboard styles
let styles = [
    "public/admin/app-assets/vendors/css/vendors.min.css",
    "public/admin/app-assets/vendors/css/editors/quill/katex.min.css",
    "public/admin/app-assets/vendors/css/editors/quill/monokai-sublime.min.css",
    "public/admin/app-assets/vendors/css/editors/quill/quill.snow.css",
    "public/admin/app-assets/vendors/css/forms/select/select2.min.css",
    "public/admin/app-assets/css/bootstrap.css",
    "public/admin/app-assets/css/bootstrap-extended.css",
    "public/admin/app-assets/css/bootstrap-extended.min.css",
    "public/admin/app-assets/css/colors.css",
    "public/admin/app-assets/css/components.css",
    "public/admin/app-assets/css/themes/dark-layout.css",
    "public/admin/app-assets/css/themes/semi-dark-layout.css",
    "public/admin/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css",
    "public/admin/app-assets/css/core/menu/menu-types/vertical-menu.css",
    "public/admin/app-assets/css/plugins/forms/form-quill-editor.css",
    "public/admin/assets/css/style.css",
    // "public/admin/plugins/fontawesome-free-5.15.1-web/css/all.css",
    "public/admin/app-assets/vendors/css/extensions/toastr.min.css",
    "public/admin/app-assets/css/pages/app-email.css",
    "public/admin/app-assets/css/plugins/extensions/ext-component-toastr.css",
    // "public/admin/app-assets/vendors/css/charts/apexcharts.css",
    // "public/admin/app-assets/css/themes/bordered-layout.css",
    // "public/admin/app-assets/css/pages/dashboard-ecommerce.css",
    // "public/admin/app-assets/css/plugins/charts/chart-apex.css",
]
// admin & seller dashboard scripts
let scripts = [
    "public/admin/app-assets/vendors/js/vendors.min.js",
    "public/admin/app-assets/vendors/js/editors/quill/katex.min.js",
    "public/admin/app-assets/vendors/js/editors/quill/highlight.min.js",
    "public/admin/app-assets/vendors/js/editors/quill/quill.min.js",
    "public/admin/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js",
    "public/admin/app-assets/js/core/app-menu.js",
    "public/admin/app-assets/js/core/app.js",
    "public/admin/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js",
    "public/admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js",
    // "public/admin/plugins/fontawesome-free-5.15.1-web/js/all.js",
    "public/admin/app-assets/vendors/js/forms/select/select2.full.min.js",
    "public/admin/app-assets/vendors/js/extensions/toastr.min.js",
    "public/admin/app-assets/vendors/js/forms/select/select2.full.min.js",
    "public/admin/app-assets/js/scripts/pages/app-email.js",
    // "public/admin/app-assets/js/scripts/pages/dashboard-ecommerce.js",
    // "public/admin/app-assets/vendors/js/charts/apexcharts.min.js",
]
mix.styles(styles, 'public/css/admin.css')
    .babel(scripts, 'public/js/admin.js')