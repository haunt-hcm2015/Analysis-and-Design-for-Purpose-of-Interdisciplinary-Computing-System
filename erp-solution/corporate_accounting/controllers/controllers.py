# -*- coding: utf-8 -*-
# from odoo import http


# class corporate_accounting(http.Controller):
#     @http.route('/corporate_accounting/corporate_accounting/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/corporate_accounting/corporate_accounting/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('corporate_accounting.listing', {
#             'root': '/corporate_accounting/corporate_accounting',
#             'objects': http.request.env['corporate_accounting.corporate_accounting'].search([]),
#         })

#     @http.route('/corporate_accounting/corporate_accounting/objects/<model("corporate_accounting.corporate_accounting"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('corporate_accounting.object', {
#             'object': obj
#         })
