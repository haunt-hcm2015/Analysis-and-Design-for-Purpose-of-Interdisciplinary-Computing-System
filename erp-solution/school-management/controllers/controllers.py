# -*- coding: utf-8 -*-
# from odoo import http


# class School-management(http.Controller):
#     @http.route('/school-management/school-management/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/school-management/school-management/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('school-management.listing', {
#             'root': '/school-management/school-management',
#             'objects': http.request.env['school-management.school-management'].search([]),
#         })

#     @http.route('/school-management/school-management/objects/<model("school-management.school-management"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('school-management.object', {
#             'object': obj
#         })
