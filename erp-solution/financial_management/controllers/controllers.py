# -*- coding: utf-8 -*-
# from odoo import http


# class financial_management(http.Controller):
#     @http.route('/financial_management/financial_management/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/financial_management/financial_management/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('financial_management.listing', {
#             'root': '/financial_management/financial_management',
#             'objects': http.request.env['financial_management.financial_management'].search([]),
#         })

#     @http.route('/financial_management/financial_management/objects/<model("financial_management.financial_management"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('financial_management.object', {
#             'object': obj
#         })
