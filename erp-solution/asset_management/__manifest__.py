# -*- coding: utf-8 -*-
{
    'name': "Asset Management",

    'summary': """
        Short (1 phrase/line) summary of the module's purpose, used as
        subtitle on modules listing or apps.openerp.com""",

    'description': """
        Long description of module's purpose
    """,

    'author': "Hau Nguyen",
    'website': "http://www.hns.com",
    'category': 'Management',
    'version': '0.1',
    'depends': ['base', 'hr', 'civil_status'],
    'data': [
        'security/asset_security.xml',
        'security/ir.model.access.csv',
        'views/asset_view.xml',
        'views/res_config_settings_view.xml'
    ],
    'demo': [
        'demo/demo.xml',
    ]
}
