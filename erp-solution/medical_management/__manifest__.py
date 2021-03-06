# -*- coding: utf-8 -*-
{
    'name': "Medical Management",

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

    # any module necessary for this one to work correctly
    'depends': ['base', 'hr', 'civil_status', 'corporate_accounting'],

    # always loaded
    'data': [
       'security/ir.model.access.csv',
       'views/res_config_settings_view.xml'
    ],
    # only loaded in demonstration mode
    'demo': [
        'demo/demo.xml',
    ],
}
