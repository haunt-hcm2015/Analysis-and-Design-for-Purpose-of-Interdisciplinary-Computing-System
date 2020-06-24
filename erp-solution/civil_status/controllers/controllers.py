# -*- coding: utf-8 -*-
# from odoo import http


# class civil_status(http.Controller):
#     @http.route('/civil_status/civil_status/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/civil_status/civil_status/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('civil_status.listing', {
#             'root': '/civil_status/civil_status',
#             'objects': http.request.env['civil_status.civil_status'].search([]),
#         })

#     @http.route('/civil_status/civil_status/objects/<model("civil_status.civil_status"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('civil_status.object', {
#             'object': obj
#         })
