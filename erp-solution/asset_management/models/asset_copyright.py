# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class AssetCopyright(models.Model):
    _name = 'asset.copyright'
    _description = 'Asset Copyright Model'
    copyright_number = fields.Char('Copyright Number')
    name = fields.Char('Copyright Name')
    author_ids = fields.Many2many('citizen')
    owner_id = fields.Many2one('res.partner', string='Owner')
    copyright_type_id = fields.Many2one('asset.copyright.type')
    country = fields.Many2one('country')
    date_of_application = fields.Date()
    validity = fields.Date()
    issued_date = fields.Date('Issued the Date')
    picture = fields.Image('Picture of Copyright Certificate')
class AssetCopyrightType(models.Model):
    _name = 'asset.copyright.type'
    _description = 'Asset Copyright Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')
  