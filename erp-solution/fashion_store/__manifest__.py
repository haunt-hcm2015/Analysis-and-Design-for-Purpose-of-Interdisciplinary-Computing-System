# -*- coding: utf-8 -*-
{
    'name': "Fashion Store Management",

    'summary': """
        Short (1 phrase/line) sumary the module's purpose, used as
        subtitle on modules listing or apps.openerp.com""",

    'description': """
        Long description of module's purpose
    """,
    'author': "Hau Nguyen",
    'website': "http://www.hns.com",
    'category': 'Management',
    'version': '0.1',
    'depends': ['base', 'hr','restaurant_management'],
    'data': [
        'security/ir.model.access.csv',
        'views/merchandise_view.xml',
        'views/res_config_settings_view.xml',
    ],
    'demo': [
        'demo/demo.xml',
    ],
}
