# -*- coding: utf-8 -*-
# from odoo import http


# class Restaurant-management(http.Controller):
#     @http.route('/restaurant-management/restaurant-management/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/restaurant-management/restaurant-management/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('restaurant-management.listing', {
#             'root': '/restaurant-management/restaurant-management',
#             'objects': http.request.env['restaurant-management.restaurant-management'].search([]),
#         })

#     @http.route('/restaurant-management/restaurant-management/objects/<model("restaurant-management.restaurant-management"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('restaurant-management.object', {
#             'object': obj
#         })
