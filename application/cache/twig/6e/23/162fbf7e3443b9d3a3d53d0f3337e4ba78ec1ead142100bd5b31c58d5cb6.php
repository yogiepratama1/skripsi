<?php

/* tambah-mapel.html */
class __TwigTemplate_6e23162fbf7e3443b9d3a3d53d0f3337e4ba78ec1ead142100bd5b31c58d5cb6 extends Twig_Template
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
        echo "Manajemen Matapelajaran -";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>";
        // line 10
        echo anchor("mapel", "Manajemen Matapelajaran");
        echo " / Tambah</h3>
    </div>
    <div class=\"module-body\">";
        // line 13
        echo get_flashdata("mapel");
        // line 15
        if (is_demo_app()) {
            // line 16
            echo get_alert("warning", get_demo_msg());
        }
        // line 19
        echo form_open("mapel/add", array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Nama <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"nama\" class=\"span8\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, set_value("nama"), "html", null, true);
        echo "\">
                    <br>";
        // line 24
        echo form_error("nama");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Deskripsi</label>
                <div class=\"controls\">
                    <textarea name=\"info\" class=\"span12\" rows=\"5\">";
        // line 30
        echo set_value("info");
        echo "</textarea>
                </div>
            </div>
            <div class=\"control-group\">
                <div class=\"controls\">";
        // line 35
        if ((is_demo_app() == false)) {
            // line 36
            echo "                    <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>";
        }
        // line 38
        echo "                    <a href=\"";
        echo twig_escape_filter($this->env, site_url("mapel"), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
                </div>
            </div>";
        // line 41
        echo form_close();
        echo "

    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "tambah-mapel.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 41,  88 => 38,  85 => 36,  83 => 35,  76 => 30,  67 => 24,  63 => 23,  56 => 19,  53 => 16,  51 => 15,  49 => 13,  44 => 10,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
