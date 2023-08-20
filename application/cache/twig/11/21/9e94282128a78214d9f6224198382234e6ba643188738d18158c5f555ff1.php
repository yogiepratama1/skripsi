<?php

/* layout.html */
class __TwigTemplate_11219e94282128a78214d9f6224198382234e6ba643188738d18158c5f555ff1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link type=\"text/css\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, base_url("assets/comp/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link type=\"text/css\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, base_url("assets/comp/bootstrap/css/bootstrap-responsive.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link type=\"text/css\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "css/theme.css\" rel=\"stylesheet\">
    <link type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, base_url("assets/comp/font-awesome/css/font-awesome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">";
        // line 11
        $this->displayBlock('css', $context, $blocks);
        // line 12
        echo "    <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["favicon_url"]) ? $context["favicon_url"] : null), "html", null, true);
        echo "\">
</head>
<body>

    <div class=\"navbar navbar-fixed-top\">
        <div class=\"navbar-inner\">
            <div class=\"container\">
                <a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".navbar-inverse-collapse\">
                    <i class=\"icon-reorder shaded\"></i>
                </a>

                <a class=\"brand\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, site_url(), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["logo_url_medium"]) ? $context["logo_url_medium"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["site_name_default"]) ? $context["site_name_default"] : null), "html", null, true);
        echo "
                </a>
            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->

    <div class=\"wrapper\">
        <div class=\"container\">";
        // line 33
        $this->displayBlock('content', $context, $blocks);
        // line 34
        echo "
        </div>
    </div><!--/.wrapper-->

    <div class=\"footer\">
        <div class=\"container\">
            <center>
                <b class=\"copyright\">";
        // line 41
        echo (isset($context["copyright_setup"]) ? $context["copyright_setup"] : null);
        echo " </b> All rights reserved.<br>
                Page loaded in";
        // line 42
        echo twig_escape_filter($this->env, (isset($context["elapsed_time"]) ? $context["elapsed_time"] : null), "html", null, true);
        echo " seconds.
            </center>
        </div>
    </div>";
        // line 46
        $this->displayBlock('js', $context, $blocks);
        // line 50
        echo "</body>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["site_name_default"]) ? $context["site_name_default"] : null), "html", null, true);
    }

    // line 11
    public function block_css($context, array $blocks = array())
    {
    }

    // line 33
    public function block_content($context, array $blocks = array())
    {
    }

    // line 46
    public function block_js($context, array $blocks = array())
    {
        // line 47
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, base_url("assets/comp/jquery/jquery.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 48
        echo twig_escape_filter($this->env, base_url("assets/comp/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 48,  129 => 47,  126 => 46,  121 => 33,  116 => 11,  110 => 6,  105 => 50,  97 => 42,  93 => 41,  84 => 34,  82 => 33,  70 => 24,  66 => 23,  46 => 10,  42 => 9,  38 => 8,  34 => 7,  30 => 6,  23 => 1,  117 => 55,  107 => 47,  103 => 46,  94 => 40,  90 => 39,  81 => 33,  77 => 32,  68 => 26,  63 => 24,  59 => 23,  51 => 12,  49 => 11,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
