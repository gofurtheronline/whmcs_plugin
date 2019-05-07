<?php
$templates = file_get_contents('https://microweber.org/api/market_json');
$templates = json_decode($templates, true);
?>
<html>
<head>
    <title>Preview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="preview_template/style.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://rawgithub.com/soulwire/fit.js/master/fit.js"></script>
    <script src="preview_template/main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="../scripts.js"></script>
</head>
<body>

<?php if ($templates["microweber-template"]): ?>
    <?php foreach ($templates["microweber-template"] as $template): ?>
        <?php if (isset($_GET['template']) AND $template['name'] == $_GET['template']): ?>
            <?php
            $screenshot = '';
            if (isset($template['latest_version']) AND isset($template['latest_version']['extra']) AND isset($template['latest_version']['extra']['_meta']) AND isset($template['latest_version']['extra']['_meta']['screenshot'])) {
                $screenshot = $template['latest_version']['extra']['_meta']['screenshot'];
            }

            $description = '';
            if (isset($template['description'])) {
                $description = $template['description'];
            }

            $name = '';
            if (isset($template['name'])) {
                $name = $template['name'];
            }

            $homepage = 'http://microweber.com';
            if (isset($template['homepage'])) {
                $homepage = $template['homepage'];
            }

            $preview_url = 'http://microweber.com';
            if (isset($template['latest_version']) AND isset($template['latest_version']['extra']) AND isset($template['latest_version']['extra']['preview_url'])) {
                $preview_url = $template['latest_version']['extra']['preview_url'];
                $preview_url = str_replace('http://', 'https://', $preview_url);
            }

            $plan = false;
            if (isset($_GET['plan'])) {
                $plan = htmlspecialchars($_GET['plan']);
            }

            $domain = false;
            if (isset($_GET['domain'])) {
                $domain = htmlspecialchars($_GET['domain']);
            }
            ?>

            <div class="first-seciton">
                <div class="container">
                    <div class="preview-navbar">
                        <div class="left">
                            <a href="#" class="back-btn">
                                <svg class="chevron-icon" width="8px" height="13px" viewBox="0 0 8 13" version="1.1">
                                    <g id="Visual-Design" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="1">
                                        <g id="9b" transform="translate(-344.000000, -357.000000)" fill="#222222">
                                            <g id="templates" transform="translate(-202.000000, 165.000000)">
                                                <path d="M544,195 L544,203 L543,203 L543,195 L543,194 L552,194 L552,195 L544,195 Z" id="Combined-Shape" transform="translate(547.500000, 198.500000) rotate(-225.000000) translate(-547.500000, -198.500000) "></path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                Back
                            </a>
                            <div class="screens">
                                <button onclick="selectDevice('desktop')" type="button">
                                    <svg width="28" height="22" viewBox="0 0 28 22" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="#fff" fill-rule="evenodd">
                                            <path d="M11 18h1v4h-1z"></path>
                                            <path d="M9 21h10v1H9z"></path>
                                            <path d="M16 18h1v4h-1z"></path>
                                            <path d="M1 3v13c0 1.11.891 2 1.996 2h22.008A2.004 2.004 0 0 0 27 16V3c0-1.11-.891-2-1.996-2H2.996A2.004 2.004 0 0 0 1 3zM0 3c0-1.657 1.35-3 2.996-3h22.008A2.994 2.994 0 0 1 28 3v13c0 1.657-1.35 3-2.996 3H2.996A2.994 2.994 0 0 1 0 16V3z"></path>
                                        </g>
                                    </svg>
                                </button>
                                <button onclick="selectDevice('tablet')" type="button">
                                    <svg width="20" height="28" viewBox="0 0 20 28" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="#fff" fill-rule="evenodd">
                                            <path d="M1 2.996v22.008C1 26.1 1.897 27 2.994 27h14.012c1.1 0 1.994-.895 1.994-1.996V2.996A2.001 2.001 0 0 0 17.006 1H2.994C1.894 1 1 1.895 1 2.996zm-1 0A2.997 2.997 0 0 1 2.994 0h14.012A3.001 3.001 0 0 1 20 2.996v22.008A2.997 2.997 0 0 1 17.006 28H2.994A3.001 3.001 0 0 1 0 25.004V2.996z"></path>
                                            <path d="M9 23h2v2H9z"></path>
                                        </g>
                                    </svg>
                                </button>
                                <button onclick="selectDevice('phone')" type="button">
                                    <svg width="12" height="22" viewBox="0 0 12 22" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="#fff" fill-rule="evenodd">
                                            <path d="M1 3.001V19C1 20.105 1.894 21 2.997 21h6.006A2 2 0 0 0 11 18.999V3A1.999 1.999 0 0 0 9.003 1H2.997A2 2 0 0 0 1 3.001zm-1 0A3 3 0 0 1 2.997 0h6.006A2.999 2.999 0 0 1 12 3.001V19A3 3 0 0 1 9.003 22H2.997A2.999 2.999 0 0 1 0 18.999V3z"></path>
                                            <path d="M5 18h2v2H5z"></path>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="right buttons">
                            <form method="get" action="<?php echo $current_url ?>" class="clearfix">
                                <input type="hidden" value="false" name="template_view"/>
                                <?php if ($name): ?>
                                    <input type="hidden" value="<?php print $name; ?>" name="template"/>
                                <?php endif; ?>

                                <?php if ($plan): ?>
                                    <input type="hidden" value="<?php print $plan; ?>" name="plan"/>
                                <?php endif; ?>

                                <?php if ($domain): ?>
                                    <input type="hidden" value="<?php print $domain; ?>" name="domain"/>
                                <?php endif; ?>

                                <a class="btn" href="<?php print $preview_url; ?>" target="_blank">View template demo</a>
                                <a href="javascript:;" class="btn btn-info" onclick="parentNode.submit();">Start with this template</a>
                            </form>
                        </div>
                    </div>


                    <?php if ($homepage): ?>
                        <div style="margin: 0 auto;">
                            <div class="device-holder device-desktop">
                                <div class="device" id="foo">
                                    <iframe src="<?php print $preview_url; ?>" frameborder="0" allowfullscreen id="bar" class="js-frame"></iframe>
                                </div>
                                <div class="device-component-1"></div>
                                <div class="device-component-2"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="arrow-more"></div>
                </div>
            </div>

        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

<?php include('partials/steps/template.php'); ?>
</body>
</html>
