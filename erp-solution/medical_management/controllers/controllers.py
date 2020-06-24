# -*- coding: utf-8 -*-
# from odoo import http


# class medical_management(http.Controller):
#     @http.route('/medical_management/medical_management/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/medical_management/medical_management/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('medical_management.listing', {
#             'root': '/medical_management/medical_management',
#             'objects': http.request.env['medical_management.medical_management'].search([]),
#         })

#     @http.route('/medical_management/medical_management/objects/<model("medical_management.medical_management"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('medical_management.object', {
#             'object': obj
#         })
