<?php

/* table/structure/optional_action_links.twig */
class __TwigTemplate_db01f50719e59bc9e2dc136a5fb020137cc2970b1f794bccda0291ef9520827b extends Twig_Template
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
        echo "<a href=\"#\" id=\"printView\">";
        echo PhpMyAdmin\Util::getIcon("b_print", _gettext("Print"), true);
        echo "</a>";
        // line 2
        if (( !($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
            // line 3
            echo "    <a href=\"sql.php\" data-post=\"";
            echo ($context["url_query"] ?? null);
            echo "&amp;session_max_rows=all&amp;sql_query=";
            // line 4
            echo twig_escape_filter($this->env, twig_urlencode_filter((("SELECT * FROM " . PhpMyAdmin\Util::backquote(($context["table"] ?? null))) . " PROCEDURE ANALYSE()")), "html", null, true);
            // line 5
            echo "\" style=\"margin-right: 0;\">";
            // line 6
            echo PhpMyAdmin\Util::getIcon("b_tblanalyse", _gettext("Propose table structure"), true);
            // line 10
            echo "
    </a>";
            // line 12
            echo PhpMyAdmin\Util::showMySQLDocu("procedure_analyse");
            // line 13
            if (($context["is_active"] ?? null)) {
                // line 14
                echo "        <a href=\"tbl_tracking.php";
                echo ($context["url_query"] ?? null);
                echo "\">";
                // line 15
                echo PhpMyAdmin\Util::getIcon("eye", _gettext("Track table"), true);
                echo "
        </a>";
            }
            // line 18
            echo "    <a href=\"#\" id=\"move_columns_anchor\">";
            // line 19
            echo PhpMyAdmin\Util::getIcon("b_move", _gettext("Move columns"), true);
            echo "
    </a>
    <a href=\"normalization.php";
            // line 21
            echo ($context["url_query"] ?? null);
            echo "\">";
            // line 22
            echo PhpMyAdmin\Util::getIcon("normalize", _gettext("Normalize"), true);
            echo "
    </a>";
        }
        // line 25
        if ((($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
            // line 26
            if (($context["is_active"] ?? null)) {
                // line 27
                echo "        <a href=\"tbl_tracking.php";
                echo ($context["url_query"] ?? null);
                echo "\">";
                // line 28
                echo PhpMyAdmin\Util::getIcon("eye", _gettext("Track view"), true);
                echo "
        </a>";
            }
        }
    }

    public function getTemplateName()
    {
        return "table/structure/optional_action_links.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 28,  70 => 27,  68 => 26,  66 => 25,  61 => 22,  58 => 21,  53 => 19,  51 => 18,  46 => 15,  42 => 14,  40 => 13,  38 => 12,  35 => 10,  33 => 6,  31 => 5,  29 => 4,  25 => 3,  23 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/structure/optional_action_links.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\table\\structure\\optional_action_links.twig");
    }
}
