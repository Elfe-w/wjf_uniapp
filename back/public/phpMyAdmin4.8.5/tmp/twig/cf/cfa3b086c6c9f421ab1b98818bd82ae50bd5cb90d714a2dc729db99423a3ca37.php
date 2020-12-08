<?php

/* table/search/table_header.twig */
class __TwigTemplate_5d61c47e688927c31456ba7f90e6bf3ca11cc56c9de429a3e5a0a48ec5a0620e extends Twig_Template
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
        echo "<thead>
    <tr>";
        // line 3
        if (($context["geom_column_flag"] ?? null)) {
            // line 4
            echo "            <th>";
            echo _gettext("Function");
            echo "</th>";
        }
        // line 6
        echo "        <th>";
        echo _gettext("Column");
        echo "</th>
        <th>";
        // line 7
        echo _gettext("Type");
        echo "</th>
        <th>";
        // line 8
        echo _gettext("Collation");
        echo "</th>
        <th>";
        // line 9
        echo _gettext("Operator");
        echo "</th>
        <th>";
        // line 10
        echo _gettext("Value");
        echo "</th>
    </tr>
</thead>
";
    }

    public function getTemplateName()
    {
        return "table/search/table_header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 10,  42 => 9,  38 => 8,  34 => 7,  29 => 6,  24 => 4,  22 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/search/table_header.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\table\\search\\table_header.twig");
    }
}
