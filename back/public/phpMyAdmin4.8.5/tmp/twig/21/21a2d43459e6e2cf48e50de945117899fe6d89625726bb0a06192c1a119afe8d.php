<?php

/* table/structure/check_all_table_column.twig */
class __TwigTemplate_d09a253284bde0d72b2cc16232258238f4850d18c8c4666a4fc1d45d480cafae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div class=\"print_ignore\">";
        // line 2
        $this->loadTemplate("select_all.twig", "table/structure/check_all_table_column.twig", 2)->display(["pma_theme_image" =>         // line 3
($context["pma_theme_image"] ?? null), "text_dir" =>         // line 4
($context["text_dir"] ?? null), "form_name" => "fieldsForm"]);
        // line 8
        echo PhpMyAdmin\Util::getButtonOrImage("submit_mult", "mult_submit", _gettext("Browse"), "b_browse", "browse");
        // line 16
        if (( !($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
            // line 17
            echo PhpMyAdmin\Util::getButtonOrImage("submit_mult", "mult_submit change_columns_anchor ajax", _gettext("Change"), "b_edit", "change");
            // line 24
            echo PhpMyAdmin\Util::getButtonOrImage("submit_mult", "mult_submit", _gettext("Drop"), "b_drop", "drop");
            // line 32
            if ((($context["tbl_storage_engine"] ?? null) != "ARCHIVE")) {
                // line 33
                echo PhpMyAdmin\Util::getButtonOrImage("submit_mult", "mult_submit", _gettext("Primary"), "b_primary", "primary");
                // line 40
                echo PhpMyAdmin\Util::getButtonOrImage("submit_mult", "mult_submit", _gettext("Unique"), "b_unique", "unique");
                // line 47
                echo PhpMyAdmin\Util::getButtonOrImage("submit_mult", "mult_submit", _gettext("Index"), "b_index", "index");
                // line 54
                echo PhpMyAdmin\Util::getButtonOrImage("submit_mult", "mult_submit", _gettext("Fulltext"), "b_ftext", "ftext");
                // line 62
                if (( !twig_test_empty(($context["tbl_storage_engine"] ?? null)) && (((                // line 63
($context["tbl_storage_engine"] ?? null) == "MYISAM") || (                // line 64
($context["tbl_storage_engine"] ?? null) == "ARIA")) || (                // line 65
($context["tbl_storage_engine"] ?? null) == "MARIA")))) {
                    // line 66
                    echo PhpMyAdmin\Util::getButtonOrImage("submit_mult", "mult_submit", _gettext("Fulltext"), "b_ftext", "ftext");
                }
                // line 75
                if (($context["central_columns_work"] ?? null)) {
                    // line 76
                    echo PhpMyAdmin\Util::getButtonOrImage("submit_mult", "mult_submit", _gettext("Add to central columns"), "centralColumns_add", "add_to_central_columns");
                    // line 83
                    echo PhpMyAdmin\Util::getButtonOrImage("submit_mult", "mult_submit", _gettext("Remove from central columns"), "centralColumns_delete", "remove_from_central_columns");
                }
            }
        }
        // line 93
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "table/structure/check_all_table_column.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 93,  55 => 83,  53 => 76,  51 => 75,  48 => 66,  46 => 65,  45 => 64,  44 => 63,  43 => 62,  41 => 54,  39 => 47,  37 => 40,  35 => 33,  33 => 32,  31 => 24,  29 => 17,  27 => 16,  25 => 8,  23 => 4,  22 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/structure/check_all_table_column.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\table\\structure\\check_all_table_column.twig");
    }
}
