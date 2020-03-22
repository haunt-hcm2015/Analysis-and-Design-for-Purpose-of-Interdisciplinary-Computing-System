# -*- coding: utf-8 -*-
# from odoo import http


# class Constructor(http.Controller):
#     @http.route('/constructor/constructor/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/constructor/constructor/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('constructor.listing', {
#             'root': '/constructor/constructor',
#             'objects': http.request.env['constructor.constructor'].search([]),
#         })

#     @http.route('/constructor/constructor/objects/<model("constructor.constructor"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('constructor.object', {
#             'object': obj
#         })
