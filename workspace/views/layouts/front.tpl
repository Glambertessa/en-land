<html>
{include file="{$workspace_dir}/assets/front_resources.tpl"}
<head>
    {$smarty.capture.meta}
    <title>{$title}</title>
    {$meta}
    {$smarty.capture.css}
    {$css}
    {$smarty.capture.js_head}
    {$jsHead}
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i]=m[i] || function(){
            (m[i].a=m[i].a||[]).push(arguments)
        };
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(72277417, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/72277417" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->

{$content}

{$smarty.capture.js_body}
{$jsEndBody}
</body>
</html>