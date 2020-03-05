# -*- coding: utf-8 -*-
# from odoo import http


# class Financial-management(http.Controller):
#     @http.route('/financial-management/financial-management/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/financial-management/financial-management/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('financial-management.listing', {
#             'root': '/financial-management/financial-management',
#             'objects': http.request.env['financial-management.financial-management'].search([]),
#         })

#     @http.route('/financial-management/financial-management/objects/<model("financial-management.financial-management"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('financial-management.object', {
#             'object': obj
#         })
