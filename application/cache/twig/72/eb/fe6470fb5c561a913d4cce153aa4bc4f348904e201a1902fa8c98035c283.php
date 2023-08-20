<?php

/* list-kelas.html */
class __TwigTemplate_72ebfe6470fb5c561a913d4cce153aa4bc4f348904e201a1902fa8c98035c283 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout-private.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout-private.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "Manajemen Kelas -";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>Manajemen Kelas</h3>
    </div>
    <div class=\"module-body\">";
        // line 13
        echo get_flashdata("kelas");
        // line 15
        if (is_demo_app()) {
            // line 16
            echo get_alert("warning", get_demo_msg());
        }
        // line 18
        echo "
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                Tambah Kelas
            </div>
            <div class=\"panel-body\">";
        // line 24
        echo form_open("kelas", array("class" => "form-horizontal row-fluid"));
        echo "
                    <div class=\"control-group\">
                        <label class=\"control-label\">Nama Kelas <span class=\"text-error\">*</span></label>
                        <div class=\"controls\">
                            <input type=\"text\" name=\"nama\" class=\"span5\" placeholder=\"Nama Kelas\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, set_value("nama"), "html", null, true);
        echo "\">
                            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>";
        // line 30
        echo form_error("nama");
        echo "
                        </div>
                    </div>";
        // line 33
        echo form_close();
        echo "
            </div>
        </div>

        <p><b>Note:</b> Kelas tidak dapat dihapus namun dapat diubah menjadi tidak aktif</p>";
        // line 39
        echo (isset($context["kelas_hirarki"]) ? $context["kelas_hirarki"] : null);
        // line 41
        if ((is_demo_app() == false)) {
            // line 42
            echo "        <br>
        <div id=\"response_update\"></div>
        <button class=\"btn btn-primary\" id=\"update-hirarki\">Update Hirarki</button>";
        }
        // line 46
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "list-kelas.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 46,  87 => 42,  85 => 41,  83 => 39,  76 => 33,  71 => 30,  67 => 28,  60 => 24,  53 => 18,  50 => 16,  48 => 15,  46 => 13,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
