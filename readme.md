# Adding a new page



## Back-end

To initiate a page, a back-end developer needs to modify corresponding route function to include page_init endpoint and define the said action.

Then in order to load the SPA take the following steps:

1. find the .py file that corresponds to the page we want to initiate (e.g.  _endpoints/reports/suppressions.py_)
2. search for the `@app.route` controller with URL corresponding to the page you want to initiate e.g. `@app.route('/reports/archive/', methods = ['GET', 'POST'])`  Inside it locate the `gen_template` function and within it change the path to the page template to `'vue-app/index.html'`

Example commit: [adding "Reports/Summary" page](https://github.com/smtp2go/smtp2go/commit/a0146f4caf259be3a60ce0fc7f122ce602fc9f42)

Another [example commit with an error](https://github.com/smtp2go/smtp2go/commit/3dd7c3313e3f85dfeabc0fb36477687fa4cb98b3) and [additional fix](https://github.com/smtp2go/smtp2go/commit/33e46a623c2fae3c417ba07a2fc6546aee376e38)

## Front-end

1. Add page component into [`src/views`](../src/views/) folder:
    1. create a folder corresponding to the navigation group and page name in the `views` folder e.g. [`reports/archives`](../src/views/reports/archives/)
    2. inside it create index.js containing the line   
    `export { default } from './PageName.vue';`  
    e.g. `export { default } from './Archives.vue';`
    3. add the base page template file, e.g. [`vue-app\src\views\reports\archives\Archives.vue`](..\src\views\reports\archives\Archives.vue)
2. Add path to [router](..\src\router\index.js) which will render the added component  eg. `const ReportsArchivesAsync = () => import('@/views/reports/archives');`
3. Also in the router create a named path object inside the routes array e.g  ```{    path: 'archive',    name: 'ReportsArchives',    component: ReportsArchivesAsync,    meta: {      title: 'Archives',    },  },```

