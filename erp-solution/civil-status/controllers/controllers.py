# -*- coding: utf-8 -*-
# from odoo import http


# class Civil-status(http.Controller):
#     @http.route('/civil-status/civil-status/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/civil-status/civil-status/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('civil-status.listing', {
#             'root': '/civil-status/civil-status',
#             'objects': http.request.env['civil-status.civil-status'].search([]),
#         })

#     @http.route('/civil-status/civil-status/objects/<model("civil-status.civil-status"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('civil-status.object', {
#             'object': obj
#         })
