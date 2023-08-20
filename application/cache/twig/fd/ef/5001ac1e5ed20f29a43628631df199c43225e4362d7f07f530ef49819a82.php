<?php

/* tambah-pengajar.html */
class __TwigTemplate_fdef5001ac1e5ed20f29a43628631df199c43225e4362d7f07f530ef49819a82 extends Twig_Template
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
        echo "Tambah Pengajar -";
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
        echo anchor(("pengajar/index/" . (isset($context["status_id"]) ? $context["status_id"] : null)), "Data Pengajar");
        echo " / Tambah Pengajar</h3>
    </div>
    <div class=\"module-body\">";
        // line 13
        echo get_flashdata("pengajar");
        // line 15
        echo form_open_multipart(("pengajar/add/" . (isset($context["status_id"]) ? $context["status_id"] : null)), array("class" => "form-horizontal row-fluid"));
        echo "
            <!-- <div class=\"control-group\">
                <label class=\"control-label\">NIP</label>
                <div class=\"controls\">
                    <input type=\"text\" id=\"nip\" name=\"nip\" class=\"span4\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, set_value("nip"), "html", null, true);
        echo "\">
                    <br>";
        // line 20
        echo form_error("nip");
        echo "
                </div>
            </div> -->
            <div class=\"control-group\">
                <label class=\"control-label\">Nama <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"nama\" class=\"span8\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, set_value("nama"), "html", null, true);
        echo "\">
                    <br>";
        // line 27
        echo form_error("nama");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Jenis Kelamin <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Laki-laki\"";
        // line 33
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Laki-laki"), "html", null, true);
        echo "> Laki-laki</label>
                    <label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Perempuan\"";
        // line 34
        echo twig_escape_filter($this->env, set_radio("jenis_kelamin", "Perempuan"), "html", null, true);
        echo "> Perempuan</label>
                    <br>";
        // line 35
        echo form_error("jenis_kelamin");
        echo "
                </div>
            </div>
            <!-- <div class=\"control-group\">
                <label class=\"control-label\">Tempat Lahir</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"tempat_lahir\" class=\"span5\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, set_value("tempat_lahir"), "html", null, true);
        echo "\">
                    <br>";
        // line 42
        echo form_error("tempat_lahir");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Tanggal Lahir</label>
                <div class=\"controls\">
                    <select class=\"span2\" style=\"width: 10%;\" name=\"tgl_lahir\">
                        <option value=\"\">Tgl</option>";
        // line 50
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 51
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "\"";
            echo twig_escape_filter($this->env, set_select("tgl_lahir", (isset($context["i"]) ? $context["i"] : null)), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "</option>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "                    </select>
                    <select class=\"span2\" style=\"width: 17%;\" name=\"bln_lahir\">
                        <option value=\"\">Bulan</option>";
        // line 56
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 57
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "\"";
            echo twig_escape_filter($this->env, set_select("bln_lahir", (isset($context["i"]) ? $context["i"] : null)), "html", null, true);
            echo ">";
            echo twig_escape_filter($this->env, get_indo_bulan((isset($context["i"]) ? $context["i"] : null)), "html", null, true);
            echo "</option>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "                    </select>
                    <input type=\"text\" name=\"thn_lahir\" class=\"span2\" maxlength=\"4\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, set_value("thn_lahir"), "html", null, true);
        echo "\" placeholder=\"Tahun\">
                    <br>";
        // line 61
        echo form_error("thn_lahir");
        echo "
                </div>
            </div> -->
            <!-- <div class=\"control-group\">
                <label class=\"control-label\">Alamat</label>
                <div class=\"controls\">
                    <input type=\"text\" name=\"alamat\" class=\"span10\" value=\"";
        // line 67
        echo twig_escape_filter($this->env, set_value("alamat"), "html", null, true);
        echo "\">
                    <br>";
        // line 68
        echo form_error("alamat");
        echo "
                </div>
            </div> -->
            <!-- <div class=\"control-group\">
                <label class=\"control-label\">Foto</label>
                <div class=\"controls\">
                    <input type=\"file\" name=\"userfile\">";
        // line 75
        echo (((!twig_test_empty((isset($context["error_upload"]) ? $context["error_upload"] : null)))) ? ((isset($context["error_upload"]) ? $context["error_upload"] : null)) : (""));
        echo "
                </div>
            </div> -->
            <div class=\"control-group\">
                <label class=\"control-label\">Username <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"text\" id=\"username\" name=\"username\" class=\"span5\" value=\"";
        // line 81
        echo twig_escape_filter($this->env, set_value("username"), "html", null, true);
        echo "\" placeholder=\"example@example.sch.id\">

                    <!-- <label class=\"checkbox inline\"><input type=\"checkbox\" name=\"default_username\" id=\"default_username\" onclick=\"username_default_pengajar()\" value=\"1\"";
        // line 83
        echo twig_escape_filter($this->env, set_checkbox("default_username", "1"), "html", null, true);
        echo "> Gunakan default username</label> -->
                    <br>";
        // line 84
        echo form_error("username");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Password <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"password\" name=\"password\" class=\"span5\" value=\"";
        // line 90
        echo twig_escape_filter($this->env, set_value("password"), "html", null, true);
        echo "\">
                    <br>";
        // line 91
        echo form_error("password");
        echo "
                </div>
            </div>
            <div class=\"control-group\">
                <label class=\"control-label\">Ulangi Password <span class=\"text-error\">*</span></label>
                <div class=\"controls\">
                    <input type=\"password\" name=\"password2\" class=\"span5\" value=\"";
        // line 97
        echo twig_escape_filter($this->env, set_value("password2"), "html", null, true);
        echo "\">
                    <br>";
        // line 98
        echo form_error("password2");
        echo "
                </div>
            </div>
            <!-- <div class=\"control-group\"> -->
                <!-- <label class=\"control-label\">Opsi</label> -->
                <!-- <div class=\"controls\"> -->
                        <input type=\"hidden\" name=\"is_admin\" value=\"1\" > 
                    <br>
                <!-- </div> -->
            <!-- </div> -->
            <div class=\"control-group\">
                <div class=\"controls\">
                    <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
                    <a href=\"";
        // line 111
        echo twig_escape_filter($this->env, site_url(("pengajar/index/" . (isset($context["status_id"]) ? $context["status_id"] : null))), "html", null, true);
        echo "\" class=\"btn\">Batal</a>
                </div>
            </div>";
        // line 114
        echo form_close();
        echo "

    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "tambah-pengajar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 114,  240 => 111,  224 => 98,  220 => 97,  211 => 91,  207 => 90,  198 => 84,  194 => 83,  189 => 81,  180 => 75,  171 => 68,  167 => 67,  158 => 61,  154 => 60,  151 => 59,  139 => 57,  135 => 56,  131 => 53,  119 => 51,  115 => 50,  105 => 42,  101 => 41,  92 => 35,  88 => 34,  84 => 33,  75 => 27,  71 => 26,  62 => 20,  58 => 19,  51 => 15,  49 => 13,  44 => 10,  40 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
