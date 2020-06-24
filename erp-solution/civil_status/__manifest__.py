# -*- coding: utf-8 -*-
{
    'name': "Civil Status Management",

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
    'depends': ['base', 'hr', 'corporate_accounting'],
    'data': [
        'security/ir.model.access.csv',
        'views/citizen_view.xml',
        'views/id_card_view.xml',
        'views/household_book_view.xml',
        'views/birth_certificate_view.xml',
        'views/res_config_settings_view.xml'
    ],
    'demo': [
        'demo/demo.xml',
    ],
}
