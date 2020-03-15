

g8 du toan

inherit model

Sự khác nhau giữa model "product", model "product.template" và tại sao lại tách biệt rời rạc hai model thành 2 file riêng biệt:
+ Ý nghĩa gốc rễ  của những model trong file product.py: Tổng thể các thuộc tính của sản phẩm. Khi tạo 1 mẫu sản phẩm thì sẽ tạo luôn 1 biến thể (volume, color, size, dung lượng bộ nhớ,... được lấy từ field "product_tmpl_id" trong product.py) cho sản phẩm
  + Model "product.category": Lưu trữ các thuộc tính loại sản phẩm 
  + Model "product.product": Lưu trữ các thuộc tính cấu thành 1 sản phẩm như loại sản phẩm, bao bì sản phẩm, thông tin nhà cung cấp, cấu hình hay biến thể của sản phẩm (field "product_tmpl_id")
  + Model "product.packaging": Lưu trữ các thuộc tính về bao bì sản phẩm 
  + Model "product.supplierinfo": Lưu trữ các thuộc tính thông tin nhà cung ứng sản phẩm 
+ Ý nghĩa gốc rễ  của những model trong file product_template.py: Lưu trữ các thuộc tính của 1 mẫu sản phẩm.
Ở đây 1 sản phẩm thực tế với những biến thể (volume, color, size, dung lượng bộ nhớ, hàm lượng công nghệ,...) được xem như 1 sản phẩm riêng biệt. Khi tạo một SO hoặc PO thì thực tế là đang sử dụng 1 variant cho sản phẩm đó (field 'purchase_ok', field 'sale_ok') 
  + Model "product.template": Lưu trữ các thuộc tính khuôn mẫu của sản phẩm 
  VD: Một chiếc áo thun sẽ có các thuộc tính khác nhau: 
      + Kích thước: S, M, L, XL, XXL,...
      + Màu sắc: Đỏ, xanh, vàng,...
      Một chiếc điện thoại 

```py
    @api.depends('product_id')
    def _compute_component_type_default(self):
        for record in self:
            if record.product_id:
                record.component_type = self.env['product.category'].browse(record.product_id.categ_id.id).name

    @api.depends('product_id')
    def _compute_component_type_default(self):
        if self.product_id and self.product_id.product_tmpl_id and self.product_id.product_tmpl_id.categ_id:
            catelog = self.env['product.category'].search([('id', '=', self.product_id.product_tmpl_id.categ_id.id)]) 
            self.construction_component_type = catelog.name

    @api.model
    def default_get(self, fields):
        result = super(ConstructionLine, self).default_get(fields)
        if result.product_id and result.product_id.product_tmpl_id and result.product_id.product_tmpl_id.categ_id:
            catelog = self.env['product.category'].search([('id', '=', result.product_id.product_tmpl_id.categ_id.id)]) 
            print(str(catelog.name))
        return result
```


 