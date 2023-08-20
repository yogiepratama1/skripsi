<?php

/* layout-ujian.html */
class __TwigTemplate_6f10fc4ca59e6f6a23646b234f1928d865f11b384246e27c3379239c258d678a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
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
    <head>";
        // line 4
        $this->env->loadTemplate("layout-header.html")->display($context);
        // line 5
        echo "        <link type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "css/read.css\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "css/ujian.css\" rel=\"stylesheet\">";
        // line 7
        $this->displayBlock('css', $context, $blocks);
        // line 8
        echo "    </head>
    <body>";
        // line 11
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "
        <br><br>
        <!--/.wrapper-->
        <div class=\"footer\">
            <div class=\"container\">
                <center>
                    <b class=\"copyright\">";
        // line 18
        echo (isset($context["copyright"]) ? $context["copyright"] : null);
        echo " </b> All rights reserved.<br>";
        // line 19
        echo (isset($context["version"]) ? $context["version"] : null);
        echo " | Page loaded in";
        echo twig_escape_filter($this->env, (isset($context["elapsed_time"]) ? $context["elapsed_time"] : null), "html", null, true);
        echo " seconds.
                </center>
            </div>
        </div>";
        // line 24
        $this->env->loadTemplate("layout-footer.html")->display($context);
        // line 25
        $this->displayBlock('js', $context, $blocks);
        // line 26
        echo "    </body>
</html>
";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
    }

    // line 25
    public function block_js($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout-ujian.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 11,  72 => 7,  66 => 26,  64 => 25,  62 => 24,  51 => 18,  43 => 12,  36 => 7,  33 => 6,  28 => 5,  26 => 4,  22 => 1,  412 => 208,  408 => 207,  404 => 206,  400 => 205,  396 => 204,  393 => 203,  391 => 202,  385 => 197,  367 => 181,  357 => 172,  335 => 166,  329 => 163,  324 => 160,  319 => 159,  302 => 158,  296 => 154,  288 => 149,  284 => 148,  282 => 147,  274 => 139,  254 => 121,  235 => 113,  225 => 109,  209 => 107,  206 => 106,  201 => 105,  196 => 102,  190 => 99,  185 => 96,  180 => 95,  163 => 94,  157 => 90,  151 => 86,  149 => 85,  147 => 83,  142 => 80,  135 => 75,  128 => 70,  118 => 62,  114 => 59,  93 => 40,  90 => 39,  87 => 37,  84 => 35,  82 => 25,  80 => 33,  73 => 28,  70 => 26,  68 => 25,  58 => 17,  54 => 19,  47 => 12,  41 => 11,  38 => 8,  32 => 4,  29 => 3,);
    }
}
