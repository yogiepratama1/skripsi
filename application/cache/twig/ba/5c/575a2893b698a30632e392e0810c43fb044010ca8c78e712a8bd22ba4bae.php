<?php

/* layout-detail-materi.html */
class __TwigTemplate_ba5c575a2893b698a30632e392e0810c43fb044010ca8c78e712a8bd22ba4bae extends Twig_Template
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
        <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>";
        // line 5
        $this->env->loadTemplate("layout-header.html")->display($context);
        // line 6
        echo "        <link type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["base_url_theme"]) ? $context["base_url_theme"] : null), "html", null, true);
        echo "css/read.css\" rel=\"stylesheet\">";
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
        <!--/.wrapper-->";
        // line 17
        $this->env->loadTemplate("layout-footer.html")->display($context);
        // line 18
        $this->displayBlock('js', $context, $blocks);
        // line 19
        echo "    </body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
    }

    // line 18
    public function block_js($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout-detail-materi.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 18,  69 => 11,  64 => 7,  58 => 4,  52 => 19,  44 => 12,  42 => 11,  39 => 8,  37 => 7,  33 => 6,  31 => 5,  28 => 4,  23 => 1,  255 => 104,  250 => 101,  247 => 100,  242 => 95,  239 => 93,  237 => 92,  222 => 87,  218 => 85,  214 => 84,  209 => 80,  204 => 77,  201 => 75,  193 => 72,  184 => 71,  180 => 70,  175 => 69,  171 => 68,  167 => 66,  165 => 65,  157 => 58,  154 => 57,  148 => 54,  144 => 53,  138 => 50,  130 => 44,  125 => 41,  120 => 39,  115 => 37,  110 => 35,  105 => 33,  101 => 31,  98 => 29,  96 => 28,  94 => 27,  89 => 23,  84 => 20,  79 => 19,  75 => 18,  68 => 17,  60 => 15,  56 => 14,  53 => 13,  50 => 18,  48 => 17,  45 => 10,  41 => 8,  38 => 7,  32 => 4,  29 => 3,);
    }
}
