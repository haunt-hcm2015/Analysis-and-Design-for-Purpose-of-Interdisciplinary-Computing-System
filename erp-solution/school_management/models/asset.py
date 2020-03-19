# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Asset(models.Model):
    _name = 'asset'
    _description = 'Asset Model'
class AssetType(models.Model):
    _name = 'asset.type'
    _description = 'Asset Type Model'