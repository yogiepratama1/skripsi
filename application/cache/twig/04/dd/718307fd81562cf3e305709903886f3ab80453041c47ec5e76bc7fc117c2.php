<?php

/* layout-print.html */
class __TwigTemplate_04dd718307fd81562cf3e305709903886f3ab80453041c47ec5e76bc7fc117c2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>";
        // line 5
        $this->env->loadTemplate("layout-header.html")->display($context);
        // line 6
        echo "    <style type=\"text/css\">
        h3.title {
            margin-bottom: 0px;
            line-height: 30px;
        }
        hr.top {
            border: none;
            border-bottom: 2px solid #333;
            margin-bottom: 10px;
            margin-top: 10px;
        }
    </style>";
        // line 18
        $this->displayBlock('css', $context, $blocks);
        // line 19
        echo "</head>
<body>
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"span12\">
                <br>
                <div class=\"kop-print\">
                    <img src=\"";
        // line 26
        echo twig_escape_filter($this->env, get_logo_config(), "html", null, true);
        echo "\">
                    <div class=\"kop-nama\">";
        // line 27
        echo twig_escape_filter($this->env, get_pengaturan("nama-sekolah", "value"), "html", null, true);
        echo "</div>
                    <div class=\"kop-info\">Alamat :";
        // line 28
        echo twig_escape_filter($this->env, get_pengaturan("alamat", "value"), "html", null, true);
        echo ", Telepon :";
        echo twig_escape_filter($this->env, get_pengaturan("telp", "value"), "html", null, true);
        echo "</div>
                </div>
                <hr class=\"kop-print-hr\">
            </div>
        </div>
        <br>";
        // line 34
        $this->displayBlock('content', $context, $blocks);
        // line 35
        echo "    </div>
</body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["site_name"]) ? $context["site_name"] : null), "html", null, true);
    }

    // line 18
    public function block_css($context, array $blocks = array())
    {
    }

    // line 34
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout-print.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 34,  83 => 4,  76 => 35,  74 => 34,  64 => 28,  60 => 27,  47 => 19,  45 => 18,  30 => 5,  27 => 4,  22 => 1,  210 => 68,  194 => 65,  190 => 64,  186 => 63,  182 => 62,  178 => 61,  175 => 60,  158 => 59,  146 => 48,  144 => 47,  140 => 43,  124 => 40,  120 => 39,  116 => 38,  111 => 37,  106 => 35,  104 => 34,  101 => 33,  97 => 32,  93 => 31,  89 => 18,  86 => 29,  69 => 28,  61 => 21,  58 => 19,  56 => 26,  48 => 11,  46 => 10,  40 => 8,  37 => 7,  32 => 6,  29 => 3,);
    }
}
