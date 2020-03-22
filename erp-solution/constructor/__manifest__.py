# -*- coding: utf-8 -*-
{
    'name': "Construction Management",
    'summary': """
        Short (1 phrase/line) summary of the module's purpose, used as
        subtitle on modules listing or apps.openerp.com""",
    'description': """
        Long description of module's purpose
    """,
    'author': "Hau Nguyen",
    'website': "http://www.hns.com",
    'category': 'Construction',
    'version': '0.1',
    'depends': ['base', 'product'],
    'data': [
        'security/security.xml',
        'security/ir.model.access.csv',
        'views/construction_view.xml',
        'views/product_template_views.xml',
    ],
    'demo': [
        'demo/demo.xml',
    ],
}
