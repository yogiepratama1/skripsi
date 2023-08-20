<?php

/* pengaturan.html */
class __TwigTemplate_8f9d7c6785edc4eca16ab1544d48104c49727a1d4b532f8759711570632a9508 extends Twig_Template
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
        echo "Pengaturan -";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"module\">
    <div class=\"module-head\">
        <h3>Pengaturan</h3>
    </div>
    <div class=\"module-body\">";
        // line 13
        echo get_flashdata("pengaturan");
        // line 15
        if (is_demo_app()) {
            // line 16
            echo get_alert("warning", get_demo_msg());
        }
        // line 19
        echo form_open_multipart("welcome/pengaturan", array("class" => "form-horizontal row-fluid"));
        echo "
            <div class=\"control-group\">
                <label class=\"control-label\">Logo sekolah</label>
                <div class=\"controls\">";
        // line 23
        $context["logo_sekolah"] = get_pengaturan("logo-sekolah", "value");
        // line 24
        if (twig_test_empty((isset($context["logo_sekolah"]) ? $context["logo_sekolah"] : null))) {
            // line 25
            echo "                        <img src=\"";
            echo twig_escape_filter($this->env, (isset($context["logo_url_medium"]) ? $context["logo_url_medium"] : null), "html", null, true);
            echo "\">";
        } else {
            // line 27
            echo "                        <a href=\"";
            echo twig_escape_filter($this->env, site_url("welcome/pengaturan/?delete-img=5"), "html", null, true);
            echo "\" onclick=\"return confirm('Anda yakin ingin menghapus?')\" class=\"pull-right\" title=\"Hapus logo\"><i class=\"icon-trash\"></i></a>
                        <img src=\"";
            // line 28
            echo twig_escape_filter($this->env, get_url_image((isset($context["logo_sekolah"]) ? $context["logo_sekolah"] : null)), "html", null, true);
            echo "\" style=\"max-width: 120px;\">";
        }
        // line 30
        echo "                    <br>Ganti logo <small>(Ukuran terbaik 120 x 122 pixel)</small><br>
                    <input type=\"file\" name=\"logo-sekolah\">
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Nama sekolah <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"nama-sekolah\" class=\"span8\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, set_value("nama-sekolah", get_pengaturan("nama-sekolah", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 38
        echo form_error("nama-sekolah");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Tahun Ajaran <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"tahun-ajaran\" class=\"span8\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, set_value("tahun-ajaran", get_pengaturan("tahun-ajaran", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 45
        echo form_error("tahun-ajaran");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Alamat sekolah <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"alamat\" class=\"span8\" value=\"";
        // line 51
        echo twig_escape_filter($this->env, set_value("alamat", get_pengaturan("alamat", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 52
        echo form_error("alamat");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Telpon</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"telp\" class=\"span5\" value=\"";
        // line 58
        echo twig_escape_filter($this->env, set_value("telp", get_pengaturan("telp", "value")), "html", null, true);
        echo "\">
                    <br>";
        // line 59
        echo form_error("telp");
        echo "
                </div>
            </div>";
        // line 63
        if ((is_demo_app() == false)) {
            // line 64
            echo "            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Update</button>
                </div>
            </div>";
        }
        // line 70
        echo form_close();
        echo "

    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "pengaturan.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 70,  136 => 64,  134 => 63,  129 => 59,  125 => 58,  116 => 52,  112 => 51,  103 => 45,  99 => 44,  90 => 38,  86 => 37,  77 => 30,  73 => 28,  68 => 27,  63 => 25,  61 => 24,  59 => 23,  53 => 19,  50 => 16,  48 => 15,  46 => 13,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
